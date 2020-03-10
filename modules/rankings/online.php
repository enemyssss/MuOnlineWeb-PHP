<div id="menu">
     <h1><span class="fontawesome-lock"></span>WHO IS ONLINE</h1>
     <fieldset>
<table class="menu-table">
    <thead>
   <tr>
       <td><b>#</b></td>
       <td><b>Name</b></td>
   </tr>
   </thead>
   <tbody>
   <?php
    include '../../includes/functions.php';

    $conn = is_sqlConn();
        $stmt = sqlsrv_query($conn,"Select GameIDC,Id collate DATABASE_DEFAULT from AccountCharacter where Id in (Select  memb___id collate DATABASE_DEFAULT from MEMB_STAT where ConnectStat=1)");
        if ($stmt === false){
            throw new Exception(print_r(sqlsrv_errors()));
        } else {
           for($i=0; $i < $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC ); $i++) {
         $rank= $i+1;
      echo"
    <tr>
         <td>$rank</td>
         <td>$row[0]</td>
    </tr>";
        }
        }

   ?>

  </tbody>
  <tfoot></tfoot>
  </table>
</fieldset>
</div>
