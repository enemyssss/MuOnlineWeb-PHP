<?php
 include_once '../includes/functions.php';
 
        
$dataPoints = array( 
	array("label"=>"Dark Wizzard", "y"=>count_rows('Select Count (*) as count from Character where class=0')),
        array("label"=>"Soul Master", "y"=>count_rows('Select Count (*) as count from Character where class=1')),
        array("label"=>"Grand Master", "y"=>count_rows('Select Count (*) as count from Character where class=3')),
        array("label"=>"Dark Knight", "y"=>count_rows('Select Count (*) as count from Character where class=16')),
        array("label"=>"Blade Knight", "y"=>count_rows('Select Count (*) as count from Character where class=17')),
        array("label"=>"Blade Master", "y"=>count_rows('Select Count (*) as count from Character where class=19')),
        array("label"=>"Elf", "y"=>count_rows('Select Count (*) as count from Character where class=32')),
        array("label"=>"Muse Elf", "y"=>count_rows('Select Count (*) as count from Character where class=33')),
        array("label"=>"High Elf", "y"=>count_rows('Select Count (*) as count from Character where class=35')),
        array("label"=>"Magic Gladiator", "y"=>count_rows('Select Count (*) as count from Character where class=48')),
        array("label"=>"Duel Master", "y"=>count_rows('Select Count (*) as count from Character where class=50')),
        array("label"=>"Dark Lord", "y"=>count_rows('Select Count (*) as count from Character where class=64')),
        array("label"=>"Lord Emperor", "y"=>count_rows('Select Count (*) as count from Character where class=66')),
        array("label"=>"Summoner", "y"=>count_rows('Select Count (*) as count from Character where class=80')),
        array("label"=>"Bloody Summoner", "y"=>count_rows('Select Count (*) as count from Character where class=81')),
        array("label"=>"Dimension Master", "y"=>count_rows('Select Count (*) as count from Character where class=82'))
);

?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Character Statistics"
	},
	data: [{
		type: "pie",
		percentFormatString: "#0.##",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>  
       
      