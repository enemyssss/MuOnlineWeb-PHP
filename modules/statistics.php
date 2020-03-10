<?php 
include '../includes/functions.php';
include '../includes/config.php';

//Class
$darkWizard = count_rows("Select Count (*) as count from Character where class=0");
$soulMaster = count_rows("Select Count (*) as count from Character where class=1");
$grandMaster = count_rows("Select Count (*) as count from Character where class=3");
$darkKnight =  count_rows("Select Count (*) as count from Character where class=16");
$bladeKnight =  count_rows("Select Count (*) as count from Character where class=17");
$bladeMaster =  count_rows("Select Count (*) as count from Character where class=19");
$elf =  count_rows("Select Count (*) as count from Character where class=32");
$museElf =  count_rows("Select Count (*) as count from Character where class=33");
$highElf =  count_rows("Select Count (*) as count from Character where class=35");
$magicGladiator =  count_rows("Select Count (*) as count from Character where class=48");
$duelMaster =  count_rows("Select Count (*) as count from Character where class=50");
$darkLord =  count_rows("Select Count (*) as count from Character where class=64");
$lordEmperor =  count_rows("Select Count (*) as count from Character where class=66");
$summoner =  count_rows("Select Count (*) as count from Character where class=80");
$bloodySummoner =  count_rows("Select Count (*) as count from Character where class=81");
$dimensionMaster =  count_rows("Select Count (*) as count from Character where class=82");

//Maps
$lorencia = count_rows("Select Count (*) as count from Character where MapNumber=0");
$dungeon = count_rows("Select Count (*) as count from Character where MapNumber=1");
$devias = count_rows("Select Count (*) as count from Character where MapNumber=2");
$noria = count_rows("Select Count (*) as count from Character where MapNumber=3");
$lostTower = count_rows("Select Count (*) as count from Character where MapNumber=4");
$arena = count_rows("Select Count (*) as count from Character where MapNumber=6");
$atlans = count_rows("Select Count (*) as count from Character where MapNumber=7");
$tarkan = count_rows("Select Count (*) as count from Character where MapNumber=8");
$icarus = count_rows("Select Count (*) as count from Character where MapNumber=10");
$ValleyofLoren = count_rows("Select Count (*) as count from Character where MapNumber=30");
$LandofTrials = count_rows("Select Count (*) as count from Character where MapNumber=31");
$aida = count_rows("Select Count (*) as count from Character where MapNumber=33");
$crywolf = count_rows("Select Count (*) as count from Character where MapNumber=34");
$kanturu = count_rows("Select Count (*) as count from Character where MapNumber=37");
$kanturu2 = count_rows("Select Count (*) as count from Character where MapNumber=38");
$kanturu3 = count_rows("Select Count (*) as count from Character where MapNumber=39");
$elbeland = count_rows("Select Count (*) as count from Character where MapNumber=51"); 
$raklion =  count_rows("Select Count (*) as count from Character where MapNumber=57");
$vulcanus =  count_rows("Select Count (*) as count from Character where MapNumber=63");


?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChartCharacter);
       google.charts.setOnLoadCallback(drawChartMaps);

      function drawChartCharacter() {

  var data = google.visualization.arrayToDataTable([
          ['Task', 'Chars'],
          ['Dark Wizard (<?php echo $darkWizard ?>)', <?php echo $darkWizard ?>],
          ['Soul Master (<?php echo $soulMaster ?>)', <?php echo $soulMaster ?>],
          ['Grand Master (<?php echo $grandMaster ?>)', <?php echo $grandMaster ?>],
          ['Dark Knight (<?php echo $darkKnight ?>)', <?php echo $darkKnight ?>],
          ['Blade Knight (<?php echo $bladeKnight ?>)', <?php echo $bladeKnight ?>],
          ['Blade Master (<?php echo $bladeMaster ?>)', <?php echo $bladeMaster ?>],
          ['Elf (<?php echo $elf ?>)', <?php echo $elf ?>],
          ['High Elf (<?php echo $highElf ?>)', <?php echo $highElf ?>],
          ['Magic Gladiator (<?php echo $magicGladiator ?>)', <?php echo $magicGladiator ?>],
          ['Duel Master (<?php echo $duelMaster ?>)', <?php echo $duelMaster ?>],
          ['Dark Lord (<?php echo $darkLord ?>)', <?php echo $darkLord ?>],
          ['Lord Emperor (<?php echo $lordEmperor ?>)', <?php echo $lordEmperor ?>],
          ['Summoner (<?php echo $summoner ?>)', <?php echo $summoner ?>],
          ['Bloody Summoner (<?php echo $bloodySummoner ?>)', <?php echo $bloodySummoner ?>],
          ['Dimension Master (<?php echo $dimensionMaster ?>)', <?php echo $dimensionMaster ?>]
        ]);
        

     var options = {
			chartArea: {
				left: 0,
                                right: 0,
                                top: 5,
                                bottom: 5,
			},
			backgroundColor: 'transparent',
			legend: { textStyle: {color: '#fff', fontSize: 16}}
		};

        var chart = new google.visualization.PieChart(document.getElementById('piechart_char'));

        chart.draw(data, options);
      }
      
            function drawChartMaps() {

  var data = google.visualization.arrayToDataTable([
          ['Task', 'Maps'],
          ['Lorencia (<?php echo $lorencia ?>)', <?php echo $lorencia ?>],
          ['Dungeon (<?php echo $dungeon ?>)', <?php echo $dungeon ?>],
          ['Devias (<?php echo $devias ?>)', <?php echo $devias ?>],
          ['Noria (<?php echo $noria ?>)', <?php echo $noria ?>],
          ['Arena (<?php echo $arena ?>)', <?php echo $arena ?>],
          ['Atlans (<?php echo $atlans ?>)', <?php echo $atlans ?>],
          ['Tarkan (<?php echo $tarkan ?>)', <?php echo $tarkan ?>],
          ['Icarus (<?php echo $icarus ?>)', <?php echo $icarus ?>],
          ['Valley of Loren (<?php echo $ValleyofLoren ?>)', <?php echo $ValleyofLoren ?>],
          ['Land of Trials (<?php echo $LandofTrials ?>)', <?php echo $LandofTrials ?>],
          ['Aida (<?php echo $aida ?>)', <?php echo $aida ?>],
          ['CryWolf (<?php echo $crywolf ?>)', <?php echo $crywolf ?>],
          ['Kantru (<?php echo $kanturu ?>)', <?php echo $kanturu ?>],
          ['Kantru 2 (<?php echo $kanturu2 ?>)', <?php echo $kanturu2 ?>],
          ['Kantru 3 (<?php echo $kanturu3 ?>)', <?php echo $kanturu3 ?>],
          ['Elbeland (<?php echo $elbeland ?>)', <?php echo $elbeland ?>],
          ['Raklion (<?php echo $raklion ?>)', <?php echo $raklion ?>],
          ['Vulcanus (<?php echo $vulcanus ?>)', <?php echo $vulcanus ?>]

        ]);

var options = {
			chartArea: {
				left: 0,
                                right: 0,
                                top: 5,
                                bottom: 5,
			},
			backgroundColor: 'transparent',
			legend: { textStyle: {color: '#fff', fontSize: 16}}
		};

        var chart = new google.visualization.PieChart(document.getElementById('piechart_maps'));

        chart.draw(data, options);
      }
      
      
    </script>
<div id="menu">
     <h1><span class="fontawesome-lock"></span>SERVER STATISTICS</h1>
     <fieldset>
<table class="menu-table"> 
   <tbody>
    <tr>
    <td><b>Server Name</b></td>
    <td><?php echo $server ?></td>
  </tr>
   <tr>
    <td><b>Version</b></td>
    <td><?php echo $serverVer ?></td>
  </tr>
     <tr>
    <td><b>Exp&Drop</b></td>
    <td><?php echo $serverExpDrop ?></td>
  </tr>
    <tr>
    <td><b>Accounts</b></td>
    <td><?php echo count_rows('SELECT Count (*) as count from memb_info'); ?></td>
  </tr>
    <tr>
    <td><b>Characters</b></td>
    <td><?php echo count_rows('SELECT Count (*) as count from Character'); ?></td>
  </tr>
    </tr>
    <tr>
    <td><b>Guilds</b></td>
    <td><?php echo count_rows('SELECT Count (*) as count from Guild');  ?></td>
  </tr>
    </tr>
    <tr>
    <td><b>In Game</b></td>
    <td><?php echo count_rows('SELECT Count (*) as count from memb_stat where ConnectStat=1'); ?></td>
  </tr>
    <tr>
        <td><b>Status</b></td>
    <td><?php echo $serstats ?></td>
  </tr>
   </tbody>
</table><br>

  <table class="menu-table"> 
      <thead><th>Character Statistics</th></thead>
  <tbody>
  <tr>
      <td>
      <div id="piechart_wrap">
      <div id="piechart_char"></div> 
      </div>
     </td>
  </tr>
  </tbody>

  </table><br>
  <table class="menu-table"> 
      <thead><th>Maps Statistics</th></thead>
  <tbody>
  <tr>
      <td>
      <div id="piechart_wrap">
      <div id="piechart_maps"></div> 
      </div>
     </td>
  </tr>
  </tbody>

  </table>
     </fieldset>
</div>
     
