<?php
include '../../../includes/functions.php';
check_session();
?>
<form id="changePassword" method="POST">
    <div id="menu">
        <h1><span class="fontawesome-lock"></span>Change Password</h1>
        <fieldset>
            <?php include 'menu.php'; ?>
            <div class="menu-div">
            <input type="password" name="mypassword" placeholder="Password">
            <input type="password" name="newpassword" placeholder="New Password">
            <input type="password" name="newrepassword" placeholder="Re-Password">
                <input type="button" class="submit" onclick ='functions("changePassword")' value="Change Password"><br>
                <div align="center" id="changePasswords"></div>
                </div>
        </fieldset>
    </div>
</form>