<form id="resetChar" method="POST">
    <div id="menu">
        <h1><span class="fontawesome-lock"></span>Reset Character</h1>
        <fieldset>
           <?php include 'menu.php'; ?>
            <table class="menu-table">
                <tbody>
                <td><div class="select">
                  <select name="resetChar" onchange="showDiv(this)" >
                      <option selected disabled>Choose an Character</option>
            <?php
        include '../../../includes/functions.php';
        include '../../../includes/config.php';
        check_session(); // Session Check -->
        $user = $_SESSION['username'];
        $conn = is_sqlConn();
        $stmt = sqlsrv_query($conn,"SELECT Name,Class,LevelUpPoint,Resets,cLevel,Grandreset from Character where AccountID='$user'");
        while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            echo "<option value='$row[0]'>$row[0] [$row[4]] [$row[3]] [$row[5]]</option>";
        }
            ?>
                   </select></div><br>
                   <input type="button" class="submit" onclick ='functions("resetChar")' value="Reset Character"><br>
                    <div align="center" id="resetChars"></td></div>
                </tbody>

        </fieldset>
    </div>
</form>
