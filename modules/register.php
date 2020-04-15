<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<form id="register" method="POST">
<div id="menu">
     <h1><span class="fontawesome-lock"></span>Register For An Account</h1>
     <fieldset>
         <div class="menu-div">
  <p>To sign-up for a free basic account please provide us with some basic information using
  the contact form below. Please use valid credentials.</p>
    <input type="text" name="username"  placeholder="Username">
    <input type="password"  name="password" placeholder="Password">
    <input type="password"  name="repassword" placeholder="Replace Password">
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="secretquest" placeholder="Secret Question">
    <input type="text" name="secretanswer" placeholder="Secret Answer">
    <div align="center" class="g-recaptcha" data-sitekey="6LeA-pUUAAAAAJKVtb3dFpe7uluUA3dJyJA-2Rro" data-theme="dark"></div><br>
    <input type="button" class="submit" onclick ='functions("register")' value="Register">
    <div align="center" id="registers"></div><br>
                   </div>

          </fieldset>
     </div>
</form>
