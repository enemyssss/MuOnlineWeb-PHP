<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<form id="contact" method="POST">
<div id ="menu">
    <h1 class="fontawesome-lock">Contact Us</h1>
    <fieldset>
        <p>To contact with us please, provide us with some basic information using
  the contact form below. Please use valid credentials.</p>
        <table class="menu-table">
            <tr>
            <td>Your Account</td>    
            <td><input type="text" name="contactUser"></td>
            </tr>
            <tr>
            <td>Your Email Adress</td>
            <td><input type="text" name="contactEmail"></td>
            </tr>
            <tr>
                <td> Subject </td>
                <td><input type="text" name="contactSubject"></td>
            </tr>
            <tr>
                <td>Comment</td>
                <td><textarea name="contactComment" maxlength="1000" cols="25" rows="6" placeholder="Write something..."></textarea></td>
            </tr>
            <tr>
                <td> Bot Check </td>
                <td><div align="center" class="g-recaptcha" data-sitekey="6LeA-pUUAAAAAJKVtb3dFpe7uluUA3dJyJA-2Rro" data-theme="dark"></div></td>
            </tr>
    </fieldset>
</table>
<center><input type="button" class="submit" onclick ='functions("contact")' value="Send Message"></center>
</div>
    <div align="center" id="contacts"><br>
</form>