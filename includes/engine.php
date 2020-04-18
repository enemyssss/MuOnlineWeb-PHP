<?php
session_start();
include 'functions.php';
include 'config.php';

//GET and POST Connections
$id = filter_input(INPUT_GET, "function", FILTER_SANITIZE_SPECIAL_CHARS);
//reCAPTCHA Setup
$reCaptcha = post_captcha(filter_input(INPUT_POST, "g-recaptcha-response", FILTER_SANITIZE_SPECIAL_CHARS));
// SQL Connection Check
$conn = is_sqlConn();



switch ($id) {

    //Login Module
    case 'login':
        $account = sqlsrv_escape_string(filter_input(INPUT_POST, "account", FILTER_SANITIZE_SPECIAL_CHARS));
        $userpass = sqlsrv_escape_string(filter_input(INPUT_POST, "userpass", FILTER_SANITIZE_SPECIAL_CHARS));

        if(empty($account) || empty($userpass)){echo 'Empty fields!';}
        elseif(isset($account) && isset($userpass) && !empty($account) && !empty($userpass)){
            $query = count_rows("SELECT Count (*) as count FROM MEMB_INFO WHERE memb___id=?",$a = array($account));
            //SQL Injection Security ->
            if($query > 0){
                $requery = count_rows2("SELECT * FROM MEMB_INFO WHERE memb___id=?",$a = array($account));
                if($requery['memb__pwd'] === cryptValue($userpass,"password")){
                    $_SESSION['username'] = $account;
                    echo "<script type=\"text/javascript\">location.reload(true);</script>";
                }
                else{
                    echo 'Invalid Login Credentials.';
                }
            } else {
                echo 'Invalid Login Credentials.';
            }
        }
        break;

    //Logout Module
    case 'logout':
        session_destroy();
        echo "<script type=\"text/javascript\">location.reload(true);</script>";
        break;

    //Register Module
    case 'register':
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $repassword = filter_input(INPUT_POST, "repassword", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $secretquest = filter_input(INPUT_POST, "secretquest", FILTER_SANITIZE_SPECIAL_CHARS);
        $secretanswer = filter_input(INPUT_POST, "secretanswer", FILTER_SANITIZE_SPECIAL_CHARS);
        $IP = $_SERVER['REMOTE_ADDR'];

        if(count_rows("SELECT Count (*) as count FROM MEMB_INFO WHERE memb___id=?)",$a = array($username))>0){echo "This username is alredy taken!";}
        elseif(count_rows("SELECT Count (*) as count FROM MEMB_INFO WHERE mail_addr=?)",$a = array($email))>0){echo "This email is alredy taken!";}
        elseif(empty($username) || empty($password) || empty($repassword) || empty($email) || empty($secretquest) || empty($secretanswer)){ echo "Empty fields!";}
        elseif(strlen($username) < 4 || strlen($password) < 4 || strlen($repassword) < 4 || strlen($email) < 4 || strlen($secretquest) < 4 || strlen($secretanswer) < 4){ echo "Please, insert more then 4 characters !";}
        elseif(strlen($username) > 10) { echo "Please, dont insert more then 10 characters in username!";}
        elseif ($repassword != $password){ echo "The passwords are not equal!";}
        elseif ($secretanswer == $secretquest){ echo "The secret answer cant be the same value as the secret question!";}
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){ echo "Please,insert email adress!"; }
        elseif (check_numeric_alpha(array($username,$password,$repassword,$secretquest,$secretanswer))){ }
        // elseif(isset($reCaptcha) && !empty($reCaptcha)) {}
        //elseif (!$reCaptcha['success']) { echo "<p>Please go back and make sure you check the security CAPTCHA box.</p><br>";}
        else{
            $sql = "INSERT INTO MEMB_INFO (memb___id,memb__pwd,memb_name,sno__numb,mail_addr,appl_days,modi_days,out__days,true_days,mail_chek,bloc_code,ctl1_code,fpas_ques,fpas_answ,IP) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $params= array($username,cryptValue($password,"password"),$username,1,cryptValue($email,"email"),0,0,0,0,1,0,0,$secretquest,$secretanswer);
            $sqlB = "INSERT INTO VI_CURR_INFO (ends_days,chek_code,used_time,memb___id,memb_name,memb_guid,sno__numb,Bill_Section,Bill_value,Bill_Hour,Surplus_Point,Surplus_Minute,Increase_Days ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $paramsB = array(date("Y"),1,1234,$username,$username,1,7,6,3,6,6,0,0);
            $stmt =  sqlsrv_query($conn,$sql,$params);
            $stmtB =  sqlsrv_query($conn,$sqlB,$paramsB);
            if( $stmt === false || $stmtB === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            else
            {
                echo "Registration successful!";
            }
        }

        break;


    // Contact Us Module
    case 'contact':
        $contactUser = sqlsrv_escape_string(filter_input(INPUT_POST, "contactUser", FILTER_SANITIZE_SPECIAL_CHARS));
        $contactEmail = sqlsrv_escape_string(filter_input(INPUT_POST, "contactEmail", FILTER_SANITIZE_SPECIAL_CHARS));
        $contactSubject = filter_input(INPUT_POST, "contactSubject", FILTER_SANITIZE_SPECIAL_CHARS);
        $contactComment = filter_input(INPUT_POST, "contactComment", FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($contactUser) || empty($contactEmail) || empty($contactSubject)|| empty($contactComment)){ echo 'We are sorry, but there appears to be a problem with the form you submitted.'; }
        elseif(count_rows("SELECT Count (*) as count FROM MEMB_INFO WHERE memb___id=?",$a = array($contactUser))<1){echo 'Please,insert valid account!';}
        elseif(count_rows("SELECT Count (*) as count FROM MEMB_INFO WHERE mail_addr=?",$a = array($contactEmail))<1){echo 'Please,insert valid email adress!';}
        elseif (!filter_var($contactEmail, FILTER_VALIDATE_EMAIL)){ echo "Please,insert valid email adress!"; }
        elseif (check_input(array($contactUser,$contactEmail))){}
        elseif (strlen($contactComment)<2){echo'The Comments you entered do not appear to be valid.';}
        elseif (strlen($contactSubject)<2){echo'The Comments you entered do not appear to be valid.';}
        //elseif(isset($reCaptcha) && !empty($reCaptcha)) {}
        //elseif (!$reCaptcha['success']) { echo "<p>Please go back and make sure you check the security CAPTCHA box.</p><br>";}
        else{
            $sendTo = "lalyo.boyadzhiev@gmail.com";
            mail($sendTo, $contactSubject, $contactComment, $contactUser);
            echo "Email sent!";
        }
        break;

    //Account Panel - Account ------------------------------------------------------------------>
    case 'changePassword':
        $mypassword = sqlsrv_escape_string(filter_input(INPUT_POST, "mypassword", FILTER_SANITIZE_SPECIAL_CHARS));
        $newpassword = sqlsrv_escape_string(filter_input(INPUT_POST, "newpassword", FILTER_SANITIZE_SPECIAL_CHARS));
        $newrepassword = sqlsrv_escape_string(filter_input(INPUT_POST, "newrepassword", FILTER_SANITIZE_SPECIAL_CHARS));

        if(empty($mypassword) || empty($newpassword) || empty($newrepassword)){ echo 'Empty fields!';}
        elseif(isset($mypassword) && isset($newpassword) && isset($newrepassword)){
            if($newpassword != $newrepassword){ echo 'Error! Check new password and re-newpassword!';}
            elseif(count_rows2("SELECT memb__pwd FROM MEMB_INFO WHERE memb___id=?",$a = array($_SESSION['username'])) != $mypassword) {echo 'Error! Check the password!';}
            elseif(strlen($newpassword) < 6){ echo 'The password must be more than 6 symbols!';}
            elseif(check_numeric_alpha($newpassword)){
            }else{
                $query = sqlsrv_query(is_sqlConn(), "Update MEMB_INFO set memb__pwd='$newpassword' where memb___id='".$_SESSION['username']."'");
                echo "Password changed successful!";
            }
        }
        break;

    //Account Panel - Account <------------------------------------------------------------------

    //Character Panel --------------------------------------------------------------->

    //ADD STATS MODULE ------>
    case 'addStats':
        $str = sqlsrv_escape_string(filter_input(INPUT_POST, "str", FILTER_SANITIZE_SPECIAL_CHARS));
        $agi = sqlsrv_escape_string(filter_input(INPUT_POST, "agi", FILTER_SANITIZE_SPECIAL_CHARS));
        $vit = sqlsrv_escape_string(filter_input(INPUT_POST, "vit", FILTER_SANITIZE_SPECIAL_CHARS));
        $ene = sqlsrv_escape_string(filter_input(INPUT_POST, "ene", FILTER_SANITIZE_SPECIAL_CHARS));
        $com = sqlsrv_escape_string(filter_input(INPUT_POST, "com", FILTER_SANITIZE_SPECIAL_CHARS));
        $charPost = filter_input(INPUT_POST, "Character", FILTER_SANITIZE_SPECIAL_CHARS);
        $check = count_rows2("Select * from Character where Name=?",$a = array($charPost));
        $checkStatus = count_rows2("Select * from Memb_Stat where memb___id=?",$a = array($_SESSION['username']));

        if ($check['Class'] == 64 || $check['Class'] == 66) {
            $sum = (int)$check['LevelUpPoint'] - ((int)$str+(int)$agi+(int)$vit+(int)$ene+(int)$com);
            if (empty($charPost)) { echo "Please, select character!";}
            elseif(checkAccountCharacter($_SESSION['username'],$charPost)){ writeText('information/hackers.txt','Account:"'.$checkStatus['memb___id'].'",IP:"'.$checkStatus['IP'].'", Date:"'.date("Y/m/d").'" , Module:"Add Stats"');}
            elseif(empty($str) || empty($agi) || empty($vit) || empty($ene)  || empty($com)) { echo "Please,fill all fields!"; }
            elseif ($str<0 || $agi<0 || $vit<0 || $ene<0 || $com<0) { echo "Please,add positive number!";}
            elseif (!is_numeric($str) || !is_numeric($agi) || !is_numeric($vit) || !is_numeric($ene) || !is_numeric($com)) { echo "Please,add only numbers!";}
            elseif ($check['LevelUpPoint'] < $sum ) { echo "You dont have enought points!";}
            elseif (isAccoutOnline($_SESSION['username'])> 0 ) { echo "Your character is online!";}
            else{
                $sql = "Update Character SET Strength=?,Dexterity=?,Vitality=?,Energy=?,Leadership=?,LevelUpPoint=? where Name=?";
                $params = array($str,$agi,$vit,$ene,$com,$sum,$charPost);
                if (sqlsrv_query($conn,$sql,$params)) {
                    echo "Points Updated!";
                }
                else {
                    echo "Error in statement execution.\n";
                    die(print_r(sqlsrv_errors(), true));
                }
                sqlsrv_close($conn);
            }
        }
        else {
            $sum = (int)$check['LevelUpPoint'] - ((int)$str+(int)$agi+(int)$vit+(int)$ene);
            if (empty($charPost)) { echo "Please, select character!";}
            elseif(empty($str) || empty($agi) || empty($vit) || empty($ene)) { echo "Please,fill all fields!"; }
            elseif ($str<0 || $agi<0 || $vit<0 || $ene<0) { echo "Please,add positive number!";}
            elseif (!is_numeric($str) || !is_numeric($agi) || !is_numeric($vit) || !is_numeric($ene)) { echo "Please,add only numbers!";}
            elseif ($check['LevelUpPoint'] < $sum ) { echo "You dont have enought points!";}
            elseif ( isAccoutOnline($_SESSION['username']) > 0 ) { echo "Your character is online!";}
            else{
                $sql = "Update Character SET Strength=?,Dexterity=?,Vitality=?,Energy=?,LevelUpPoint=? where Name=?";
                $params = array($str,$agi,$vit,$ene,$sum,$charPost);
                if (sqlsrv_query($conn,$sql,$params)) {
                    echo "Points Updated!";
                }
                else {
                    echo "Error in statement execution.\n";
                    die(print_r(sqlsrv_errors(), true));
                }
                sqlsrv_close($conn);
            }
        }

        break;

    //ADD STATS MODULE <------

    //RESET CHARACTER MODULE ------>
    case 'resetChar':

        $charPost = filter_input(INPUT_POST, "resetChar", FILTER_SANITIZE_SPECIAL_CHARS);
        $check = count_rows2("Select * from Character where Name=?",$a=array($charPost));
        $checkStatus = count_rows2("Select * from Memb_Stat where memb___id=?",$a = array($_SESSION['username']));
        $resetData = retriveResetCharConf($check['Class'],$clearStats);
        if (empty($charPost)) {echo "Please, select character!";}
        elseif	(checkAccountCharacter($_SESSION['username'],$charPost)){ writeText('information/hackers.txt','Account:"'.$checkStatus['memb___id'].'",IP:"'.$checkStatus['IP'].'", Date:"'.date("Y/m/d").'" , Module:"Reset Character"');}
        elseif	(count($resetData)== 0){echo "Error with the module, please contact the administrator.\n";}
        elseif	($check['cLevel'] < $resetData[1]){ echo "You dont have level for reset!"; }
        elseif	($check['Resets'] == $resetData[2]){ echo "Max resets!"; }
        elseif	($check['cLevel'] < $resetData[1]){ echo "You dont have level for reset!"; }
        elseif 	(isAccoutOnline($_SESSION['username']) > 0 ) { echo "Your character is online!";}
        elseif 	(userResource($charPost,$resetData[4]) < $resetData[3]) { echo "Your don't have ". number_format($resetData[3]) . " {$resetData[4]} to reset";}
        else{
            $math = userResource($charPost,$resetData[4]) - $resetData[3];
            switch($clearStats){
                case 0:
                    $sql = "Update Character SET cLevel=?,Resets=?,MapNumber=?,MapPosX=?,MapPosY=?,Money=?,Experience=?,PkLevel=?,LevelUpPoint=? where Name=?";
                    $params = array(1,$check['Resets']+1,$resetData[5][0],$resetData[5][1],$resetData[5][2],$math,1,0,0,$charPost);
                    break;
                case 1:
                    $sql = "Update Character SET cLevel=?,Resets=?,MapNumber=?,MapPosX=?,MapPosY=?,Money=?,Experience=?,PkLevel=?,LevelUpPoint=?,Strength=?,Dexterity=?,Vitality=?,Energy=?, LeaderShip=? where Name=?";
                    $params = array(1,$check['Resets']+1,$resetData[5][0],$resetData[5][1],$resetData[5][2],$math,1,0,0,$resetData[6][0],$resetData[6][1],$resetData[6][2],$resetData[6][3],$resetData[6][4],$charPost);
                    break;
                default:
                    echo "ERROR 404!";
                    break;
            }

            if (sqlsrv_query($conn,$sql,$params)) { echo "Resets Updated!";}
            else {echo "Error in statement execution.\n"; die(print_r(sqlsrv_errors(), true));}
            sqlsrv_close($conn);
        }
        break;


    //RESET CHARACTER MODULE <------

//TELEPORT CHARACTER MODULE ------>
    case 'teleportChar':
//TELEPORT CHARACTER MODULE ------>
    case 'teleportChar':
        $charPost = filter_input(INPUT_POST, "teleportChar", FILTER_SANITIZE_SPECIAL_CHARS);
        $cityPost = isset($_POST['city'])? (int)$_POST['city']: "";
        $sql = "Update Character SET MapNumber=?,MapPosX=?,MapPosY=?,Money=?  where Name=?";
        $check = count_rows2("Select * from Character where Name=?",$a = array($charPost));
        $checkStatus = count_rows2("Select * from Memb_Stat where memb___id=?",$a = array($_SESSION['username']));

        if (empty($charPost)) {echo "Please, select character!";}
        elseif(empty($cityPost)){echo "Please, select location!";}
        elseif(!in_array($cityPost, range(0, count($ModTeleportConf) - 1))){ echo "Please do not edit the form fields!";}
        elseif (isAccoutOnline($_SESSION['username']) > 0 ) { echo "Your character is online!";}
        elseif ($ModTeleportConf[$cityPost][3] < $ModTeleportConf[$cityPost][2]) {
            echo "Your dont have enought {$ModTeleportConf[$cityPost][3]}! You need " . number_format($ModTeleportConf[$cityPost][2]) . " {$ModTeleportConf[$cityPost][3]} to teleport.";
        }
        else{
            $getLocation = explode(",", $ModTeleportConf[$cityPost][1]);
            $math  = userResource($charPost,$ModTeleportConf[$cityPost][3]) - $ModTeleportConf[$cityPost][2];
            if (sqlsrv_query($conn,$sql,$getLocation[0],$getLocation[1],$getLocation[2],$math,$charPost)) {
                echo "Character {$charPost} teleported to {$ModTeleportConf[$cityPost][0]}!";
            }
            else {
                echo "Error in statement execution.\n";
                die(print_r(sqlsrv_errors(), true));
            }
            sqlsrv_close($conn);
        }
        break;
        break;
    //TELEPORT CHARACTER MODULE <------

    //Clear Skills  MODULE <------

    case 'clearModule':
        $optionPost = filter_input(INPUT_POST, "options", FILTER_SANITIZE_SPECIAL_CHARS);
        $charPost = filter_input(INPUT_POST, "clearModule", FILTER_SANITIZE_SPECIAL_CHARS);
        $check = count_rows2("Select * from Character where Name=?",$a = array($charPost));
        if (empty($charPost) || empty($optionPost)) { echo "Please, select Character and Option!"; }
        elseif (isAccoutOnline($_SESSION['username']) > 0 ) { echo "Your character is online!";}
        else{
            switch ($optionPost)
            {
                case "nm":
                    if ($check['Money'] < $clearSkillsMoney) { echo " You dont have enought money to clear your skills!"; }
                    else{
                        $sql = "Update Character set MagicList=CONVERT(varbinary(180), null), Money=? where Name=?";
                        $params= array($check['Money'] - $clearSkillsMoney,$charPost);
                        if (sqlsrv_query($conn,$sql,$params))
                        {
                            echo "Your normal skills are cleared!";
                        }
                        else{
                            echo "Error in statement execution.\n";
                            die(print_r(sqlsrv_errors(), true));
                            sqlsrv_close($conn);
                        }
                    }
                    break;

                case "sk":
                    if ($check['Money'] < $clearSkillTreeMoney) { echo " You dont have enought money to clear your Skill Tree!"; }
                    else {
                        $sql = "Update MasterSkillTree set MasterSkill = CAST('0' AS VARBINARY) where Name=?";
                        $params = array($charPost);
                        if (sqlsrv_query($conn, $sql, $params)) {
                            echo "Your Master Skill Tree is cleared!";
                        } else {
                            echo "Error in statement execution.\n";
                            die(print_r(sqlsrv_errors(), true));
                            sqlsrv_close($conn);
                        }
                    }
                    break;

                case "inv":
                    if ($check['Money'] < $clearInvMoney) { echo " You dont have enought money to clear your inventory!"; }
                    else {
                        $sql = "Update Character set Inventory=CONVERT(varbinary(1728), null), Money=? where Name=?";
                        $params = array($check['Money'] - $clearInvMoney,$charPost);
                        if (sqlsrv_query($conn, $sql, $params)) {
                            echo "Your Inventory is cleared!";
                        } else {
                            echo "Error in statement execution.\n";
                            die(print_r(sqlsrv_errors(), true));
                            sqlsrv_close($conn);
                        }
                    }
                    break;

                case "pk":
                    if ($check['Money'] < $clearPKMoney) { echo " You dont have enought money to clear your PK!"; }
                    else {
                        $sql = "Update Character set PkLevel=? ,PkTime=?, Money=? where Name=?";
                        $params = array(2, 0,$check['Money'] - $clearPKMoney, $charPost);
                        if (sqlsrv_query($conn, $sql, $params)) {
                            echo "Your Character is cleared!";
                        } else {
                            echo "Error in statement execution.\n";
                            die(print_r(sqlsrv_errors(), true));
                            sqlsrv_close($conn);
                        }
                    }
                    break;

            }

        }


        break;
        break;
}



//Character Panel <-----------------------------------------------------------------
