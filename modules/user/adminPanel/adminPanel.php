<div id="menu">
    <h1><span class="fontawesome-lock"></span>Admin Panel</h1>
    <fieldset>
        <?php
        include '../../../includes/functions.php';
        include '../../../includes/config.php';
        check_session();
        if (checkAdmin($_SESSION['username']) > 0){
            include "menu.php";
        }
        else
        {
            $checkStatus = count_rows2("Select * from Memb_Stat where memb___id='".$_SESSION['username']."'");
            writeText('../../../includes/information/hackers.txt','Account:"'.$checkStatus['memb___id'].'",IP:"'.$checkStatus['IP'].'", Date:"'.date("Y/m/d").'" , Module:"Admin Panel"');
            echo "You are not admin!";
        }
        ?>
    </fieldset>
</div>