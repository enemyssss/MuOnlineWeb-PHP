<div id="menu">
     <h2><span class="fontawesome-lock"></span>TOP 5 GUILDS</h2>
     <fieldset>
    <table class="menu-table">
    <thead>
   <tr>
       <th><b>#</b></th>
       <th><b>Name</b></th>
       <th><b>Memb</b></th>
       <th><b>Score</b></th>
   </tr>
   </thead>
   <tbody>
   <?php
    $conn = is_sqlConn();
        $stmt = sqlsrv_query($conn,'SELECT TOP 5 G_Name,Number,G_Score from Guild order by G_Score desc');
        if ($stmt === false){
            throw new Exception(print_r(sqlsrv_errors()));
        } else {
         for($i=0; $i < $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC); ++$i)
         {
          $rank = $i+1;
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
