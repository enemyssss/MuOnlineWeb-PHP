<?php

#================================
# SQL Connection Check Function
#================================
function is_sqlConn(){
    require('config.php');
    $conn = sqlsrv_connect($serverName,$connectionInfo);
    if ($conn === false) {
        throw new Exception(print_r(sqlsrv_errors()));
    } else {
        return $conn;
    }
}

#================================
# Statistics Func 1
#================================
function count_rows($query,$params=array()){
    require('config.php');
    $conn = is_sqlConn();
    $stmt = sqlsrv_query($conn,$query,$params);
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC))
        return $row[0];
}

#================================
# Statistics Func 2
#================================
function count_rows2($query,$params=array()){
    require('config.php');
    $conn = is_sqlConn();
    $stmt = sqlsrv_query($conn,$query,$params);
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
        return $row;
}

function retriveResetCharConf($character, $withRes){
    require('config.php');
    if($withRes == 0){$start = 0; $end = 2;}
    elseif($withRes == 1){$start = 2; $end = count($ModResetConf);}
    for($i=$start; $i < $end; $i++){
        if(in_array($character,$ModResetConf[$i][0])){
            return $ModResetConf[$i];
        }
    }
    return [];
}

#================================
# Security Function - Check Input
#================================
function check_numeric_alpha($array){
    if (is_array($array)){
        foreach ($array as $values){
            if(!preg_match("/^[a-zA-Z0-9\-\_]*$/",$values)){
                return 1;
            }
        }
    }
}

#================================
# Security Function - SQL Injection
#================================

function sqlsrv_escape_string($data) {
    if ( !isset($data) or empty($data) ) return '';
    if ( is_numeric($data) ) return $data;

    $non_displayables = array(
        '/%0[0-8bcef]/',            // url encoded 00-08, 11, 12, 14, 15
        '/%1[0-9a-f]/',             // url encoded 16-31
        '/[\x00-\x08]/',            // 00-08
        '/\x0b/',                   // 11
        '/\x0c/',                   // 12
        '/[\x0e-\x1f]/'             // 14-31
    );
    foreach ( $non_displayables as $regex )
        $data = preg_replace( $regex, '', $data );
    $data = str_replace("'", "''", $data );
    return $data;
}

#================================
# Security Function
#================================
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_source($problem);
    }
    return $data;
}


#================================
# reCAPTCHA v2 func
#================================
function post_captcha($user_response) {
    $fields_string = '';
    $fields = array(
        'secret' => '6LeA-pUUAAAAAF1gD6f9uKnrfb3Ey4MY0LZ9dHfR', // Insert your secret key here
        'response' => $user_response
    );
    foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
    $fields_string = rtrim($fields_string, '&');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

    $result = curl_exec($ch);
    curl_close($ch);

    return json_decode($result, true);
}

#================================
# Session Check Function
#================================
function check_session(){
    session_start();
    if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
        echo '<script type=\"text/javascript\">location.reload(true);</script>';
    }
}

#================================
# Check Account-Session != AccountCharacter
#================================

function checkAccountCharacter($account,$charName)
{
    require('config.php');
    $conn = is_sqlConn();
    $params = array($charName);
    $stmt = sqlsrv_query($conn,"SELECT AccountID,Name from Character JOIN AccountCharacter ON AccountCharacter.Id=Character.AccountID where Name=?",$params);
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC))
        return $account != $row[0];
}

#================================
# Check Admin Account
#================================

function checkAdmin($account)
{
    require('config.php');
    $conn = is_sqlConn();
    $stmt = sqlsrv_query($conn,"SELECT administrator from MEMB_INFO WHERE memb___id=?",$params = array($account));
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC))
        return $row[0];
}

#================================
# Write text Function
#================================
function writeText($filename,$text)
{

    if (file_exists($filename))
    {
        $current = file_get_contents($filename);
        $current .= $text."\n";
        file_put_contents($filename, $current);
    }
    else
    {
        $myfile = fopen($filename, "w");
        $current = file_get_contents($filename);
        $current .= $text."\n";
        file_put_contents($filename, $current);
    }

}

#================================
# Is Account Online Funcktion
#================================
function isAccoutOnline($account)
{
    $checkStatus = count_rows2("Select * from Memb_Stat where memb___id=?",$a = array($account));
    return $checkStatus['ConnectStat']  > 0? 1:0;
}

#================================
#Is Server Online Function
#================================
function serverOn(){
    include_once("includes/config.php");
    return is_resource(@fsockopen($serverIp, $serverPort,$errNo, $errStr, 0.01)) ? "ON" : "OFF";
}

function userResource($charOrAccount, $resource){
    #================================
    # @ Function userResource check the database for requested user resource and return it's current amount
    # @ param: int $charOrAccount | value 1 = account Name, value 2 = character Name
    # @ param: string $resource |
    # @ possible $resource values : credits, zen
    # @ return: integer resource amount
    #================================
    switch($resource){
        case "credits":
            return count_rows2("Select * from Memb_Credits where memb___id=?", $a = array($charOrAccount))['credits'];
        case "zen":
            return count_rows2("Select Money from Character where Name=?", $a = array($charOrAccount))['Money'];
    }
}

#================================
# Class Decode Function
#================================
function char_class($value, $view=0)
{
    $class = array(
        0  => array("Dark Wizard","DW"),1 => array("Soul Master","SM"),2 => array("Grand Master","GrM"),3 => array("Grand Master","GrM"),
        16 => array("Dark Knight","DK"),17 => array("Blade Knight","BK"),18 => array("Blade Master","BM"),19 => array("Blade Master","BM"),
        32 => array("Fairy Elf","Elf"),33 => array("Muse Elf","ME"),34 => array("High Elf","HE"),35 => array("High Elf","HE"),
        48 => array("Magic Gladiator"),49 => array("Duel Master","DM"),50 => array("Duel Master","DM"),
        64 => array("Dark Lord","DL"),65 => array("Lord Emperor","LE"),66 => array("Lord Emperor","LE"),
    );

    return isset($class[$value][$view]) ? $class[$value][$view] : 'Unknown';
}

#================================
# Crypt Function
# $value = what to crypt
# $id = witch option in the switch
#================================
function cryptValue($value,$id)
{
    switch ($id)
    {
        case "password":
            $cryptedPass = crypt($value,"saltPasS");
            return $cryptedPass;
            break;
        case "email":
            $cryptedEmail = crypt($value,"salteMail");
            return $cryptedEmail;
            break;
    }
}