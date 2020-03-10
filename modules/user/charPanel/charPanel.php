<div id="menu">
        <h1><span class="fontawesome-lock"></span>Character Panel</h1>
        <fieldset>
           <?php include 'menu.php'; ?>
            <table class="menu-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Level</th>
                        <th>Class</th>
                        <th>Resets</th>
                        <th>G-Resets</th>
                    </tr>
                </thead>
                <tbody>
            <?php         
        include '../../../includes/functions.php';
        include '../../../includes/config.php';
        check_session();
        
        $user = $_SESSION['username'];    
        $conn = is_sqlConn();
        $stmt = sqlsrv_query($conn,"SELECT top 10 Name,cLevel,class,Resets,grandreset from Character where AccountID='$user'");

         for($i=0; $i < $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC); ++$i)
         {
          $rank = $i+1;
         if ($row[2] == 0) { $row[2] = "Dark Wizard"; }
         if ($row[2] == 1) { $row[2] = "Soul Master"; }
         if ($row[2] == 2) { $row[2] = "Grand Master"; }
         if ($row[2] == 3) { $row[2] = "Grand Master"; }
         if ($row[2] == 16) { $row[2] = "Dark Knight"; }
         if ($row[2] == 17) { $row[2] = "Blade Knight"; }
         if ($row[2] == 19) { $row[2] = "Blade Master"; }
         if ($row[2] == 32) { $row[2] = "Elf"; }
         if ($row[2] == 33) { $row[2] = "Muse Elf"; }
         if ($row[2] == 34) { $row[2] = "High Elf"; }
         if ($row[2] == 35) { $row[2] = "High Elf"; }
         if ($row[2] == 48) { $row[2] = "Magic Gladiator"; }
         if ($row[2] == 49) { $row[2] = "Duel Master"; }
         if ($row[2] == 50) { $row[2] = "Duel Master"; }
         if ($row[2] == 64) { $row[2] = "Dark Lord"; }
         if ($row[2] == 65) { $row[2] = "Lord Emperor"; }
         if ($row[2] == 66) { $row[2] = "Lord Emperor"; }
         if ($row[2] == 80) { $row[2] = "Summoner"; }
         if ($row[2] == 81) { $row[2] = "Bloody Summoner"; }
         if ($row[2] == 82) { $row[2] = "Dimension Master"; }
         if ($row[2] == 83) { $row[2] = "Dimension Master"; }
      echo"
    <tr>
         <td>$rank</td>
         <td>$row[0]</td>
         <td>$row[1]</td>
         <td>$row[2]</td>
         <td>$row[3]</td>
         <td>$row[4]</td>
    </tr>";

        }
            ?>
                </tbody>
            </table>
        </fieldset>
    </div>