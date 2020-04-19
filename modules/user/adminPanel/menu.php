<div class="accNav">
    <a onclick ='web("modules/user/adminPanel/addNews.php")'>Add News</a>
    <a onclick ='web("modules/user/accPanel/ChangePassword.php")'>Edit Character</a>
    <a onclick ='web("modules/user/accPanel/ChangePassword.php")'>Ban Character</a>
    <a onclick ='web("modules/user/accPanel/ChangePassword.php")'>Warn Character</a>
</div>

<?php
include '../../../includes/functions.php';
include '../../../includes/config.php';

check_session();

if (checkAdmin($_SESSION['username']) == 0)
{
        session_destroy();
        echo "<script type=\"text/javascript\">location.reload(true);</script>";
}
?>