<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<form id="addNews" method="POST">
    <div id ="menu">
        <h1 class="fontawesome-lock">Add News</h1>
        <fieldset>
            <?php include 'menu.php'; ?>
            <div class="menu-div">
                <input type="text" name="title" placeholder="Title">
                <input type="text" name="author" placeholder="Author">
                <textarea name="content" maxlength="1000" cols="25" rows="6" placeholder="Add content..."></textarea>
               <!-- <div align="center" class="g-recaptcha" data-sitekey="6LeA-pUUAAAAAJKVtb3dFpe7uluUA3dJyJA-2Rro" data-theme="dark"></div> -->
                 <input type="button" class="submit" onclick ='functions("addNews")' value="Write News">
                <div align="center" id="addNewss"><br>
            </div>

        </fieldset>
    </div>

</form>