<form id="addStats" method="POST">
    <div id="menu">
        <h1><span class="fontawesome-lock"></span>ADD STATS</h1>
        <fieldset>
           <?php include 'menu.php'; ?>
            <div class="menu-div">
                <td><div class="select">
                  <select name="Character" onchange="showDiv(this)" >
                      <option selected disabled>Choose an Character</option>
            <?php
        include '../../../includes/functions.php';
        include '../../../includes/config.php';
        check_session(); // Session Check -->
        $user = $_SESSION['username'];
        $conn = is_sqlConn();
        $stmt = sqlsrv_query($conn,"SELECT Name,Class,LevelUpPoint from Character where AccountID='$user'");
        while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
           if ($row[1] == 64 || $row[1] == 66 ) {
             $charClass = "DL";
           }
           else {
             $charClass = "NM";
           }
            echo "<option value='$row[0]' data='$charClass'>$row[0] [$row[2]]</option>";
        }
            ?>
                   </select></div><br>
                    <div>
                        <input type="text" name="str" placeholder="Strength">
                        <input type="text" name="agi" placeholder="Agility">
                        <input type="text" name="vit" placeholder="Vitality">
                        <input type="text" name="ene" placeholder="Energy">
                        <div id="commandDiv" style="display:none;"><input type="text" name="com" placeholder="Command"> </div>
                    </div>
                   <input type="button" class="submit" onclick ='functions("addStats")' value="Add Stats"><br>
                    <div align="center" id="addStatss"></td></div>
                </div>
        </fieldset>
    </div>
</form>
