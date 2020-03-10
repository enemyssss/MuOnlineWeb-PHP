<div id="menu">
    <h1><span class="fontawesome-lock"></span>TOP 50 GUILDS</h1>
     <fieldset>
<table class="menu-table">
    <thead>
   <tr>
       <td><b>#</b></td>
       <td><b>Guild Name</b></td>
       <td><b>Guild Master</b></td>
       <td><b>Members</b></td>
       <td><b>Score</b></td>
   </tr>
   </thead>
   <tbody>
   <?php
    include '../../includes/functions.php';
    
    $conn = is_sqlConn();
        $stmt = sqlsrv_query($conn,'SELECT TOP 50 G_Name,G_Master,Number,G_Score from Guild order by G_Score desc');
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
         <td>$row[3]</td>
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