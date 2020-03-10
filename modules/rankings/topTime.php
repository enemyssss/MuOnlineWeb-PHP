<div id="menu">
     <h1><span class="fontawesome-lock"></span>TOP TOTAL ONLINE TIME</h1>
     <fieldset>
<table class="menu-table">
    <thead>
   <tr>
       <td><b>#</b></td>
       <td><b>Name</b></td>
       <td><b>Total Online Time</b></td>
   </tr>
   </thead>
   <tbody>
   <?php
    include '../../includes/functions.php';
    
    $conn = is_sqlConn();
        $query = sqlsrv_query($conn,"Select TOP 50 memb___id,TotalTime from MEMB_STAT order by TotalTime desc");
        for($i=0; $i <= $row = sqlsrv_fetch_array( $query, SQLSRV_FETCH_NUMERIC ); $i++ ){
        
        $query2 = sqlsrv_query($conn,"Select GAMEIDC from AccountCharacter where Id='$row[0]'");
        $row2 = sqlsrv_fetch_array( $query2, SQLSRV_FETCH_NUMERIC );

         $rank= $i+1;
         $mins = $row[1];
         $hours = floor($mins/60);
         $days = floor($hours/24);
         $hours = $hours % 24;
         $mins = $row[1] % 60;
         
         
      echo"
    <tr>
         <td>$rank</td>
         <td>$row2[0]</td>
         <td>$days days, $hours hours, $mins minutes</td>
    </tr>";
        
        }  
        
 
   ?>
       
  </tbody>
  <tfoot></tfoot>
  </table>
</fieldset>
</div>