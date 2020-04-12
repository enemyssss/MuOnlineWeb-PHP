            <div id="menu">
            <?php
            include '../includes/functions.php';
            include '../includes/config.php';
              $conn = is_sqlConn();
              $sql = sqlsrv_query($conn,"Select date,[content],subject,author FROM news ORDER BY date DESC ");
              for($i=0; $i < $row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_NUMERIC); ++$i)
              {
                  echo "
                     <article>
                    <h1><span class=\"fontawesome-lock\"></span>".base64_decode($row[2])."</h1>
                    <fieldset>
                    <p>".base64_decode($row[1])."</p>
                    <p>". date("d M Y",$row[0])." by ".$row[3]."</p>
                    </fieldset>
                    </article> ";
              }
              ?>
               </div>
