            <div id="menu">
            <?php
            include '../includes/functions.php';
            include '../includes/config.php';
              $conn = is_sqlConn();
              $check = count_rows("Select date,[content],subject,author FROM news ORDER BY date DESC");
              $sql = sqlsrv_query($conn,"Select date,[content],subject,author FROM news ORDER BY date DESC ");


              if ($check == 0)
              {
                echo " <article>
                        <h1><span class=\"fontawesome-lock\"></span>NEWS</h1>
                        <fieldset>
                        <p>We do not have any news at the moment, please come back later for updates!</p>
                        </fieldset>
                        </article>";
              }
                else
                {
                  for($i=0; $i < $row = sqlsrv_fetch_array($sql, SQLSRV_FETCH_NUMERIC); ++$i)
                  {
                      echo "
                         <article>
                        <h1><span class=\"fontawesome-lock\"></span>".base64_decode($row[2])."</h1>
                        <fieldset>
                        <p>".base64_decode($row[1])."</p>
                        <p>". date("d M Y",$row[0])." by ".base64_decode($row[3])."</p>
                        </fieldset>
                        </article> ";

                  }
                }
              ?>
               </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            