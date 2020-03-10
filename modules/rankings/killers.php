<div id="menu">
     <h1><span class="fontawesome-lock"></span>TOP 50 KILLERS</h1>
     <fieldset>
<table class="menu-table">
    <thead>
   <tr>
       <td><b>#</b></td>
       <td><b>Name</b></td>
       <td><b>Class</b></td>
       <td><b>Kills</b></td>
   </tr>
   </thead>
   <tbody>
   <?php
    include '../../includes/functions.php';
    
    $conn = is_sqlConn();
        $stmt = sqlsrv_query($conn,'SELECT TOP 50 Name,class,PkCount from Character order by PkCount desc');
        if ($stmt === false){
            throw new Exception(print_r(sqlsrv_errors()));
        } else {

         for($i=0; $i < $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC); ++$i)
         {
          $rank = $i+1;
         if ($row[1] == 0) { $row[1] = "Dark Wizard"; }
         if ($row[1] == 1) { $row[1] = "Soul Master"; }
         if ($row[1] == 2) { $row[1] = "Grand Master"; }
         if ($row[1] == 3) { $row[1] = "Grand Master"; }
         if ($row[1] == 16) { $row[1] = "Dark Knight"; }
         if ($row[1] == 17) { $row[1] = "Blade Knight"; }
         if ($row[1] == 19) { $row[1] = "Blade Master"; }
         if ($row[1] == 32) { $row[1] = "Elf"; }
         if ($row[1] == 33) { $row[1] = "Muse Elf"; }
         if ($row[1] == 34) { $row[1] = "High Elf"; }
         if ($row[1] == 35) { $row[1] = "High Elf"; }
         if ($row[1] == 48) { $row[1] = "Magic Gladiator"; }
         if ($row[1] == 49) { $row[1] = "Duel Master"; }
         if ($row[1] == 50) { $row[1] = "Duel Master"; }
         if ($row[1] == 64) { $row[1] = "Dark Lord"; }
         if ($row[1] == 65) { $row[1] = "Lord Emperor"; }
         if ($row[1] == 66) { $row[1] = "Lord Emperor"; }
         if ($row[1] == 80) { $row[1] = "Summoner"; }
         if ($row[1] == 81) { $row[1] = "Bloody Summoner"; }
         if ($row[1] == 82) { $row[1] = "Dimension Master"; }
         if ($row[1] == 83) { $row[1] = "Dimension Master"; }
      echo"
    <tr>
         <td>$rank</td>
         <td>$row[0]</td>
         <td>$row[1]</td>
         <td>$row[2]</td>
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