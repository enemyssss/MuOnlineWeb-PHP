<?php
if(isset($_SESSION['username'])){
    echo'
    <form id="logout" method="POST"> 
<div id="menu">
     <h2><span class="fontawesome-lock"></span>ACCOUNT PANEL</h2>
     <fieldset>
     <div class="main">
<nav class="vertical-nav">
<ul>
<li><a onclick=\'web("modules/user/accPanel/accPanel.php")\'>Account Panel</a></li>
<li><a onclick=\'web("modules/user/charPanel/charPanel.php")\'>Character Panel</a></li>
<li><a href="#">Buy Credits</a></li>
<li><a href="#">Market Place</a></li>
</ul>  
</nav>
 <input type="button" class="submit" onclick ="functions(\'logout\')" value="Logout"><br>
    </div>
          <div align="center" id="logouts"><br></div>
         
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