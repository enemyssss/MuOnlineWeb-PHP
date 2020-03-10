<?php
include '../../../includes/functions.php';
check_session();
?>
<form id="changePassword" method="POST">
    <div id="menu">
        <h1><span class="fontawesome-lock"></span>Change Password</h1>
        <fieldset>
            <input type="password" name="mypassword" placeholder="Password">
            <input type="password" name="newpassword" placeholder="New Password">
            <input type="password" name="newrepassword" placeholder="Re-Password"
             <input type="button" class="submit" onclick ='functions("changePassword")' value="Change Password">   
                <div align="center" id="changePasswords"><br>
        </fieldset>
    </div>
</form>