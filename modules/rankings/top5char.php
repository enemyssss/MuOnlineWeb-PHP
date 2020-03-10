<div id="menu">
     <h2><span class="fontawesome-lock"></span>TOP 5 CHARACTERS</h2>
     <fieldset>
    <table class="menu-table">
    <thead>
   <tr>
       <th><b>#</b></th>
       <th><b>Name</b></th>
       <th><b>Level</b></th>
       <th><b>Reset</b></th>
       <th><b>GR</b></th>
   </tr>
   </thead>
   <tbody>
   <?php
    $conn = is_sqlConn();
        $stmt = sqlsrv_query($conn,'SELECT TOP 5 Name,cLevel,Resets,grandreset from Character order by grandreset desc,Resets desc,cLevel desc');
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
  </table>
  </fieldset>      
  </div>