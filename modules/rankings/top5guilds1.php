<script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);
      var cssClassNames = {headerRow: 'rankingClass'};

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name',);
        data.addColumn('string', 'GMaster');
        data.addColumn('string', 'Memers');
        data.addColumn('string', 'Score');
        data.addRows([ 
                      <?php
                        include_once 'includes/functions.php';
        $conn = is_sqlConn();
        $stmt = sqlsrv_query($conn,'SELECT TOP 5 G_Name,G_Master,Number,G_Score from Guild order by G_Score desc');
        if ($stmt === false){
            throw new Exception(print_r(sqlsrv_errors()));
        } else {

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
        echo "['" . $row[0] . "',
              '" . $row[1] . "',
              '" . $row[2] . "',
              '" . $row[3] . "'],";

            }
        }
        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
       
 ?> ]); 
        var table = new google.visualization.Table(document.getElementById('top5guilds'));
        

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
    </script>

