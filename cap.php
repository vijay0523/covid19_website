<!DOCTYPE HTML>
<html>
<head>
<<?php 
require "db_connect.php";
$sql1 = "SELECT COUNT(*),`Status`FROM status GROUP BY `Status` ORDER BY `Status` desc";
$result4 = $conn->query($sql1) or die($conn->error);  
 ?>
<script type="text/javascript">
window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer",
	{
		theme: "light2",
		title:{
			text: "Status now"
		},		
		data: [
		{       
			type: "pie",
			showInLegend: true,
			toolTipContent: "{y} - #percent %",
			legendText: "{indexLabel}",
			dataPoints: [
			<?php
			while(($row = $result4->fetch_row())!== null)
			{
				echo "{ y: {$row['0']}, label: '{$row['1']}' },";
			}
		?>
			]
		}
		]
	});
	chart.render();
}
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script></head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
</body>
 </html>