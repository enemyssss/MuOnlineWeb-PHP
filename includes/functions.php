<?php

// SQL Connection Check func
function is_sqlConn(){
    require('config.php');
    $conn = sqlsrv_connect($serverName,$connectionInfo);
    if ($conn === false) {
        throw new Exception(print_r(sqlsrv_errors()));
    } else {
    return $conn;
   }
}

// Statistics func
function count_rows($query){
    require('config.php');
    $conn = is_sqlConn();
        $stmt = sqlsrv_query($conn,$query);
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC))
            return $row[0];
}

// Statistics func 2
function count_rows2($query){
    require('config.php');
    $conn = is_sqlConn();
        $stmt = sqlsrv_query($conn,$query);
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
            return $row;
}


//Security func
function check_numeric_alpha($array){
if (is_array($array)){
foreach ($array as $values){
if(!preg_match("/^[a-zA-Z0-9\-\_]*$/",$values)){
echo "You have unhallowed characters in field!";
}
}
}
}

// SQL Injection Security
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

// Security Func 2
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


//reCAPTCHA v2 func
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

    //Session check func
    function check_session(){
        session_start();
        if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
            echo '<script type=\"text/javascript\">location.reload(true);</script>';
        }
    }

    // Check Account-Session != AccountCharacter
    function checkAccountCharacter($account,$charName)
    {
        require('config.php');
        $conn = is_sqlConn();
        $params = array($charName);
        $stmt = sqlsrv_query($conn,"SELECT AccountID,Name from Character JOIN AccountCharacter ON AccountCharacter.Id=Character.AccountID where Name=?",$params);
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC))
            return $account != $row[0];
    }

    // Write text
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
