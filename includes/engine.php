<?php
session_start();
include 'functions.php';
include 'config.php';


//GET and POST Connections
 $id = filter_input(INPUT_GET, "function", FILTER_SANITIZE_SPECIAL_CHARS);
 //reCAPTCHA Setup
 $reCaptcha = post_captcha(filter_input(INPUT_POST, "g-recaptcha-response", FILTER_SANITIZE_SPECIAL_CHARS));


 switch ($id) {
     //Login Module
     case 'login':
     $account = sqlsrv_escape_string(filter_input(INPUT_POST, "account", FILTER_SANITIZE_SPECIAL_CHARS));
     $userpass = sqlsrv_escape_string(filter_input(INPUT_POST, "userpass", FILTER_SANITIZE_SPECIAL_CHARS));

      if(empty($account) || empty($userpass)){echo 'Empty fields!';}
      elseif(isset($account) && isset($userpass) && !empty($account) && !empty($userpass)){
      $query = count_rows("SELECT Count (*) as count FROM MEMB_INFO WHERE memb___id='$account'");
       //SQL Injection Security ->
      if($query > 0){
           $requery = count_rows2("SELECT * FROM MEMB_INFO WHERE memb___id='$account'");
      if($requery['memb__pwd'] === $userpass){
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

    if(count_rows("SELECT Count (*) as count FROM MEMB_INFO WHERE memb___id='$username'")>0){echo "This username is alredy taken!";}
    elseif(count_rows("SELECT Count (*) as count FROM MEMB_INFO WHERE mail_addr='$email'")>0){echo "This email is alredy taken!";}
    elseif(empty($username) || empty($password) || empty($repassword) || empty($email) || empty($secretquest) || empty($secretanswer)){ echo "Empty fields!";}
    elseif(strlen($username) < 4 || strlen($password) < 4 || strlen($repassword) < 4 || strlen($email) < 4 || strlen($secretquest) < 4 || strlen($secretanswer) < 4){ echo "Please, insert more then 4 characters!";}
    elseif ($repassword != $password){ echo "The passwords are not equal!";}
    elseif ($secretanswer == $secretquest){ echo "The secret answer cant be the same value as the secret question!";}
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){ echo "Please,insert email adress!"; }
    elseif (check_numeric_alpha(array($username,$password,$repassword,$secretquest,$secretanswer))){ }
    elseif(isset($reCaptcha) && !empty($reCaptcha)) {}
    elseif (!$reCaptcha['success']) { echo "<p>Please go back and make sure you check the security CAPTCHA box.</p><br>";}
    else{
    $query = sqlsrv_query(is_sqlConn(), "INSERT INTO MEMB_INFO (memb___id,memb__pwd,memb_name,sno__numb,mail_addr,appl_days,modi_days,out__days,true_days,mail_chek,bloc_code,ctl1_code,fpas_ques,fpas_answ,reg_time) VALUES ('$username','$password','Test','1','$email','0','0','0','0','1','0','0','$secretquest','$secretanswer','".time()."')");
    echo "Registration successful!";
    break;
      }

    // Contact Us Module
    case 'contact':
     $contactUser = sqlsrv_escape_string(filter_input(INPUT_POST, "contactUser", FILTER_SANITIZE_SPECIAL_CHARS));
     $contactEmail = sqlsrv_escape_string(filter_input(INPUT_POST, "contactEmail", FILTER_SANITIZE_SPECIAL_CHARS));
     $contactSubject = filter_input(INPUT_POST, "contactSubject", FILTER_SANITIZE_SPECIAL_CHARS);
     $contactComment = filter_input(INPUT_POST, "contactComment", FILTER_SANITIZE_SPECIAL_CHARS);

     if(empty($contactUser) || empty($contactEmail) || empty($contactSubject)|| empty($contactComment)){ echo 'We are sorry, but there appears to be a problem with the form you submitted.'; }
     elseif(count_rows("SELECT Count (*) as count FROM MEMB_INFO WHERE memb___id='$contactUser'")<1){echo 'Please,insert valid account!';}
     elseif(count_rows("SELECT Count (*) as count FROM MEMB_INFO WHERE mail_addr='$contactEmail'")<1){echo 'Please,insert valid email adress!';}
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
         elseif(count_rows2("SELECT memb__pwd FROM MEMB_INFO WHERE memb___id='".$_SESSION['username']."'") != $mypassword) {echo 'Error! Check the password!';}
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
         (int)$str = sqlsrv_escape_string(filter_input(INPUT_POST, "str", FILTER_SANITIZE_SPECIAL_CHARS));
         (int)$agi = sqlsrv_escape_string(filter_input(INPUT_POST, "agi", FILTER_SANITIZE_SPECIAL_CHARS));
         (int)$vit = sqlsrv_escape_string(filter_input(INPUT_POST, "vit", FILTER_SANITIZE_SPECIAL_CHARS));
         (int)$ene = sqlsrv_escape_string(filter_input(INPUT_POST, "ene", FILTER_SANITIZE_SPECIAL_CHARS));
         (int)$com = sqlsrv_escape_string(filter_input(INPUT_POST, "com", FILTER_SANITIZE_SPECIAL_CHARS));
         $charPost = filter_input(INPUT_POST, "Character", FILTER_SANITIZE_SPECIAL_CHARS);
         $check = count_rows2("Select * from Character where Name='$charPost'");
         $checkStatus = count_rows2("Select * from Memb_Stat where memb___id='".$_SESSION['username']."'");
         if ($checkClass == 64 || $checkClass == 66) {
           $sum = (int)$check['LevelUpPoint'] - ((int)$str+(int)$agi+(int)$vit+(int)$ene+(int)$com);
           if (empty($charPost)) { echo "Please, select character!";}
           elseif(checkAccountCharacter($_SESSION['username'],$charPost)){ echo "Nice try!!";}
           elseif(empty($str) || empty($agi) || empty($vit) || empty($ene)  || empty($com)) { echo "Please,fill all fields!"; }
           elseif ($str<0 || $agi<0 || $vit<0 || $ene<0 || $com<0) { echo "Please,add positive number!";}
           elseif (!is_numeric($str) || !is_numeric($agi) || !is_numeric($vit) || !is_numeric($ene) || !is_numeric($com)) { echo "Please,add only numbers!";}
           elseif ($check['LevelUpPoint'] < $sum ) { echo "You dont have enought points!";}
           elseif ($checkStatus > 0 ) { echo "Your character is online!";}
           else{
               $conn = is_sqlConn();
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
              elseif ($checkStatus['ConnectStats'] > 0 ) { echo "Your character is online!";}
              else{
                  $conn = is_sqlConn();
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
            $check = count_rows2("Select * from Character where Name='$charPost'");
            $sum = $check['Resets']+1;
            $checkStatus = count_rows2("Select * from Memb_Stat where memb___id='".$_SESSION['username']."'");
                if (empty($charPost)) {echo "Please, select character!";}
                elseif(checkAccountCharacter($_SESSION['username'],$charPost)){ echo "Nice try!!";}
                elseif($check['cLevel'] < $resetLevel) { echo "You dont have level for reset!"; }
                elseif ($maxResets == $check['Resets']) { echo "Max resets!";}
                elseif ($checkStatus['ConnectStat'] > 0 ) { echo "Your character is online!";}
                else{
                    $conn = is_sqlConn();
                    $sql = "Update Character SET cLevel=1,Resets=?  where Name=?";
                    $params = array($sum,$charPost);
                    if (sqlsrv_query($conn,$sql,$params)) {
                        echo "Resets Updated!";
                    }
                    else {
                        echo "Error in statement execution.\n";
                        die(print_r(sqlsrv_errors(), true));
                    }
                    sqlsrv_close($conn);

                }

        break;


          //RESET CHARACTER MODULE <------

//TELEPORT CHARACTER MODULE ------>
case 'teleportChar':
            $charPost = filter_input(INPUT_POST, "teleportChar", FILTER_SANITIZE_SPECIAL_CHARS);
            $cityPost = filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS);
            $check = count_rows2("Select * from Character where Name='$charPost'");
            $checkStatus = count_rows2("Select * from Memb_Stat where memb___id='".$_SESSION['username']."'");
            $math = $check['Money'] - $teleportMoney;
                if (empty($charPost)) {echo "Please, select character!";}
                elseif (empty($cityPost)) {echo "Please, select city!";}
                elseif(checkAccountCharacter($_SESSION['username'],$charPost)){ echo "Nice try!!";}
                elseif ($checkStatus['ConnectStat'] > 0 ) { echo "Your character is online!";}
                elseif ($check['Money'] < $teleportMoney ) { echo "Your dont have enought money! You need $teleportMoney zen to teleport.";}
                else{
                  switch ($cityPost) {
                    case 'Lorencia':
                    $conn = is_sqlConn();
                    $sql = "Update Character SET MapNumber=0,MapPosX=134,MapPosY=127,Money=? where Name=?";
                    $params = array($math,$charPost);
                    if (sqlsrv_query($conn,$sql,$params)) {
                        echo "Character $charPost teleported to Lorencia!";
                    }
                    else {
                        echo "Error in statement execution.\n";
                        die(print_r(sqlsrv_errors(), true));
                    }
                    sqlsrv_close($conn);
                      break;

                      case 'Devias':
                      $conn = is_sqlConn();
                      $sql = "Update Character SET MapNumber=2,MapPosX=206,MapPosY=40,Money=?  where Name=?";
                      $params = array($math,$charPost);
                      if (sqlsrv_query($conn,$sql,$params)) {
                          echo "Character $charPost teleported to Devias!";
                      }
                      else {
                          echo "Error in statement execution.\n";
                          die(print_r(sqlsrv_errors(), true));
                      }
                      sqlsrv_close($conn);
                        break;

                        case 'Noria':
                        $conn = is_sqlConn();
                        $sql = "Update Character SET MapNumber=3,MapPosX=172,MapPosY=107,Money=?  where Name=?";
                        $params = array($math,$charPost);
                        if (sqlsrv_query($conn,$sql,$params)) {
                            echo "Character $charPost teleported to Noria!";
                        }
                        else {
                            echo "Error in statement execution.\n";
                            die(print_r(sqlsrv_errors(), true));
                        }
                        sqlsrv_close($conn);
                          break;


                    default:
                      echo "Please,select one of the options!";
                      break;
                  }


                }
        break;
    }

//TELEPORT CHARACTER MODULE <------

     //Character Panel <-----------------------------------------------------------------
