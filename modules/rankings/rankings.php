<div id="menu">
     <h1><span class="fontawesome-lock"></span>TOP 50 CHARACTERS</h1>
     <fieldset>
<table class="menu-table">
    <thead>
   <tr>
       <th><b>#</b></th>
       <th><b>Name</b></th>
       <th><b>Level</b></th>
       <th><b>Class</b></th>
       <th><b>Reset</b></th>
       <th><b>GR</b></th>
   </tr>
   </thead>
   <tbody>
   <?php
    include '../../includes/functions.php';
    
    $conn = is_sqlConn();
        $stmt = sqlsrv_query($conn,'SELECT TOP 50 Name,cLevel,class,Resets,grandreset,AccountID from Character order by grandreset desc,Resets desc,cLevel desc');
        if ($stmt === false){
            throw new Exception(print_r(sqlsrv_errors()));
        } else {

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
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
        }
   ?>
       
  </tbody>
  <tfoot></tfoot>
  </table>
</fieldset>
</div>