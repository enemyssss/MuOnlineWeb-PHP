<?php
 include_once '../includes/functions.php';
 
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
?>

       

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

  var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Dark Wizard', <?php echo json_encode($darkWizard); ?>],
          ['Soul Master', <?php echo json_encode($soulMaster); ?>],
          ['Grand Master', <?php echo json_encode($grandMaster); ?>],
          ['Dark Knight', <?php echo json_encode($darkKnight); ?>],
          ['Blade Knight', <?php echo json_encode($bladeKnight); ?>],
          ['Blade Master', <?php echo json_encode($bladeMaster); ?>],
          ['Elf', <?php echo json_encode($elf); ?>],
          ['High Elf', <?php echo json_encode($highElf); ?>],
          ['Magic Gladiator', <?php echo json_encode($magicGladiator); ?>],
          ['Duel Master', <?php echo json_encode($duelMaster); ?>],
          ['Dark Lord', <?php echo json_encode($darkLord); ?>],
          ['Lord Emperor', <?php echo json_encode($lordEmperor); ?>],
          ['Summoner', <?php echo json_encode($summoner); ?>],
          ['Bloody Summoner', <?php echo json_encode($bloodySummoner); ?>],
          ['Dimension Master', <?php echo json_encode($dimensionMaster); ?>],
        ]);

        var options = {
          title: 'Character Statistics'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
      