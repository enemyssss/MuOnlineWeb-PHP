<form id="teleportChar" method="POST">
    <div id="menu">
        <h1><span class="fontawesome-lock"></span>Reset Character</h1>
        <fieldset>
           <?php include 'menu.php'; ?>
            <table class="menu-table">
                <tbody>
                <td><div class="select">
                        <select name="teleportChar">
                            <option selected disabled>Choose an Character</option>
                            <?php
                            include '../../../includes/functions.php';
                            include '../../../includes/config.php';
                            check_session(); // Session Check -->
                            $user = $_SESSION['username'];
                            $conn = is_sqlConn();
                            $stmt = sqlsrv_query($conn,"SELECT Name,Class,LevelUpPoint,Resets,cLevel,Grandreset from Character where AccountID='$user'");
                            while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
                                    echo "<option value='$row[0]'>$row[0]</option>";
                                }
                            ?>
                        </select> </div><br>
                    <div class="select">
                    <select name="city" >
                        <option selected disabled>Choose an City</option>
                        <option value="Lorencia">Lorencia</option>
                        <option value="Devias">Devias</option>
                        <option value="Noria">Noria</option>
                    </select>
                    </div>
                   <input type="button" class="submit" onclick ='functions("teleportChar")' value="Teleport Character"><br>
                    <div align="center" id="teleportChars"></td></div>
                </tbody>

        </fieldset>
    </div>
</form>
