<div id="menu">
        <h1><span class="fontawesome-lock"></span>Character Panel</h1>
        <fieldset>
          <?php
          include '../../../includes/functions.php';
          include '../../../includes/config.php';
          include 'menu.php';
          check_session();

        $user = $_SESSION['username'];
        $conn = is_sqlConn();
        $stmt = sqlsrv_query($conn,"SELECT TOP 20 Name,cLevel,class,Resets,grandreset,Strength,Dexterity,Vitality,Energy,Leadership from Character where AccountID=?",$params = array($user));

          if($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC) == 0)
          {
              echo "<article><p>Your character panel is empty! </p></article>";
          }
          else
          {
         for($i=0; $i < $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC); ++$i)
         {
             $check = count_rows2("Select * from GuildMember where Name=?", $a = array($row[0]));

             if($check['G_Name'] == NULL) { $check['G_Name'] = "None";}
             if ($row[2] == 0) { $row[2] = "Dark Wizard"; $img = "<img src=\"images/class/wizards.png\" />"; $cmd = "None"; }
             if ($row[2] == 1) { $row[2] = "Soul Master"; $img = "<img src=\"images/class/wizards.png\" />"; $cmd = "None"; }
             if ($row[2] == 2) { $row[2] = "Grand Master"; $img = "<img src=\"images/class/wizards.png\" />"; $cmd = "None"; }
             if ($row[2] == 3) { $row[2] = "Grand Master"; $img = "<img src=\"images/class/wizards.png\" />"; $cmd = "None"; }
             if ($row[2] == 16) { $row[2] = "Dark Knight"; $img = "<img src=\"images/class/knights.png\" />"; $cmd = "None"; }
             if ($row[2] == 17) { $row[2] = "Blade Knight"; $img = "<img src=\"images/class/knights.png\" />"; $cmd = "None"; }
             if ($row[2] == 19) { $row[2] = "Blade Master"; $img = "<img src=\"images/class/knights.png\" />"; $cmd = "None"; }
             if ($row[2] == 32) { $row[2] = "Elf"; $img = "<img src=\"images/class/elves.png\" />"; $cmd = "None"; }
             if ($row[2] == 33) { $row[2] = "Muse Elf"; $img = "<img src=\"images/class/elves.png\" />"; $cmd = "None"; }
             if ($row[2] == 34) { $row[2] = "High Elf"; $img = "<img src=\"images/class/elves.png\" />"; $cmd = "None"; }
             if ($row[2] == 35) { $row[2] = "High Elf"; $img = "<img src=\"images/class/elves.png\" />"; $cmd = "None"; }
             if ($row[2] == 48) { $row[2] = "Magic Gladiator"; $img = "<img src=\"images/class/gladiators.png\" />"; $cmd = "None"; }
             if ($row[2] == 49) { $row[2] = "Duel Master"; $img = "<img src=\"images/class/gladiators.png\" />"; $cmd = "None"; }
             if ($row[2] == 50) { $row[2] = "Duel Master"; $img = "<img src=\"images/class/gladiators.png\" />"; $cmd = "None"; }
             if ($row[2] == 64) { $row[2] = "Dark Lord"; $img = "<img src=\"images/class/lords.png\" />"; $cmd = $row[9];  }
             if ($row[2] == 65) { $row[2] = "Lord Emperor"; $img = "<img src=\"images/class/lords.png\" />"; $cmd = $row[9];  }
             if ($row[2] == 66) { $row[2] = "Lord Emperor"; $img = "<img src=\"images/class/lords.png\" />";  $cmd = $row[9];  }
             if ($row[2] == 80) { $row[2] = "Summoner"; $img = "<img src=\"images/class/sum.png\" />";  $cmd = "None"; }
             if ($row[2] == 81) { $row[2] = "Bloody Summoner"; $img = "<img src=\"images/class/sum.png\" />"; $cmd = "None";  }
             if ($row[2] == 82) { $row[2] = "Dimension Master"; $img = "<img src=\"images/class/sum.png\" />"; $cmd = "None";  }
             if ($row[2] == 83) { $row[2] = "Dimension Master"; $img = "<img src=\"images/class/sum.png\" />"; $cmd = "None";  }

                  echo'
              <div class="proMain">
              <a  onclick =\'web("modules/user/charPanel/charPanel.php")\'>
                <div class="proChara">
                <div class="proTitle"> '.$row[0].'
                    </div>
                    <div class="proGif">
               '.$img.'
                    </div>
                  <div class="proDet" >
                     <div class="proBox">
                      <s_1> Level:</s_1>       <s_2>'.$row[1].'</s_2></div>
                     <div class="proBox">
                      <s_1>Class:</s_1>       <s_2>'.$row[2].'</s_2></div>
                    <div class="proBox">
                      <s_1>Resets:</s_1>       <s_2>'.$row[3].'</s_2></div>
                      <div class="proBox">
                      <s_1>G-Resets:</s_1>       <s_2>'.$row[4].'</s_2></div>
                     <div class="proBox">
                      <s_1>Guild:</s_1>       <s_2>'.$check['G_Name'].'</s_2></div>
                    <div class="proBox">
                      <s_1>Strength:</s_1>       <s_2>'.$row[5].'</s_2></div>
                       <div class="proBox">
                      <s_1>Agility:</s_1>       <s_2>'.$row[6].'</s_2></div>
                       <div class="proBox">
                      <s_1>Vitality:</s_1>       <s_2>'.$row[7].'</s_2></div>
                      <div class="proBox">
                      <s_1>Energy:</s_1>       <s_2>'.$row[8].'</s_2></div>
                      <div class="proBox">
                      <s_1>Command:</s_1>       <s_2>'.$cmd.'</s_2></div>
                      </div>
                    </div>
                    </a>
                </div>';
        }
         }
            ?>
            </div>
          </fieldset>
    </div>
