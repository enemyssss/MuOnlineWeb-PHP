
<?php
if(isset($_SESSION['username'])){
    echo'
    <form id="logout" method="POST">
<div id="menu">
     <h2><span class="fontawesome-lock"></span>ACCOUNT PANEL</h2>
     <fieldset>
     <div class="nav-container">
  <ul class="nav">
    <li>
      <a onclick =\'web("modules/user/accPanel/accPanel.php")\'>
        <span class="icon"><i class="fa fa-address-card"></i></span>
        <span class="text">Account Settings</span>
      </a>
    </li>
    <li>
      <a onclick =\'web("modules/user/charPanel/charPanel.php")\'>
     <span class="icon"><i class="fa fa-gamepad"></i></span>
        <span class="text">Character Panel</span>
      </a>
      </li>
    <li>
      <a href="#">
        <span class="icon"><i class="fa fa-credit-card"></i></span>
        <span class="text">Buy Credits</span>
      </a>
      </li>
    <li>
      <a href="#">
        <span class="icon"><i class="fa fa-bar-chart"></i></span>
        <span class="text">Market Place</span>
      </a>
    </li>
  </ul>
</div>
      </fieldset>
  </div>
          </form> ';
}
else{
    echo'
         <form id="login" method="POST">
<div id="menu">
     <h2><span class="fontawesome-lock"></span>ACCOUNT PANEL</h2>
     <fieldset>
     <div class="main">
                    <input type="text" placeholder="Username" name="account">
                    <input type="password" placeholder="Password" name="userpass">
                    <input type="button" class="submit" onclick ="functions(\'login\')" value="Login">
                    </div>
          <div align="center" id="logins"><br> </div>
         </fieldset>
  </div>
          </form> ';
}
?>
