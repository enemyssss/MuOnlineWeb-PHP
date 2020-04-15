<form id="clearModule" method="POST">
    <div id="menu">
        <h1><span class="fontawesome-lock"></span>Clear Skills & Inventory</h1>
        <fieldset>
            <?php include 'menu.php'; ?>
            <div class="menu-div">
                <td><div class="select">
                        <select name="clearModule">
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
                        </select> </div>
                    <div class="select">
                        <select name="options">
                            <option selected disabled>Choose an Option</option>
                            <option value="nm">Clear Skills</option>
                            <option value="st">Clear Skill Tree</option>
                            <option value="inv">Clear Inventory</option>
                            <option value="pk">Clear PK</option>
                        </select>
                    </div>
                    <input type="button" class="submit" onclick ='functions("clearModule")' value="Clear"><br>
                    <div align="center" id="clearModules"></td></div>
    </div>

    </fieldset>
    </div>
</form>
