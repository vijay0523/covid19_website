<!DOCTYPE html>
<html lang = "en-US">
<head>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
<title>COVID-19 STATISTICS</title>
<?php
require "db_connect.php";
$query1 = "SELECT * FROM patients NATURAL JOIN state NATURAL JOIN status NATURAL JOIN nationality NATURAL JOIN transmission;";
$query2 = "SELECT * FROM `state`";
$query3 = "SELECT count(*),`State code` FROM `patients` GROUP BY `State code` ORDER BY `State code`";
$result1 = $conn->query($query1) or die($conn->error);
$result2 = $conn->query($query2) or die($conn->error);
$result3 = $conn->query($query3) or die($conn->error);
?>
<script>
window.onload = function () {
	
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	
	title:{
		text:"Number of COVID-19 cases by State"
	},
	axisX:{
		interval: 1
	},
	axisY2:{
		interlacedColor: "rgba(0,0,0,0)",
		gridColor: "rgba(1,77,101,.1)",
		title: "Number of Cases"
	},
	data: [{
		type: "bar",
		name: "companies",
		axisYType: "secondary",
		color: "#cc0000",
		dataPoints: [
		<?php
		while(($row = $result3->fetch_row())!== null)
		{
			echo "{ y: {$row['0']}, label: '{$row['1']}' },";
		}
		?>
		]
	}]
});
chart.render();

}
</script>
<body>

<table id="Confirms" border ="2" style="length:900px;width:350px;">
                  <thead>
                    <tr style= "background-color: #A4A4A4;">
                      <td>Patient Number</td>
                      <td>State Code</td>
                      <td>Date Announced</td>
                      <td>Age Bracket</td>
					  <td>Gender</td>
					  <td>Notes</td>
					  <td>Detected State</td>
					  <td>Current Status</td>
					  <td>Nationality</td>
					  <td>Type of Transmission</td>
                    </tr>
                  </thead>
                <tbody>
                    <?php
                      while(($row = $result1->fetch_row()) !== null){
                        echo
                        "<tr>
                          <td>{$row['0']}</td>
                          <td>{$row['1']}</td>
                          <td>{$row['2']}</td>
                          <td>{$row['3']}</td>
						  <td>{$row['4']}</td>
						  <td>{$row['5']}</td>
						  <td>{$row['6']}</td>
						  <td>{$row['7']}</td>
						  <td>{$row['8']}</td>
						  <td>{$row['9']}</td>
                        </tr>\n";
                      }
                    ?>
                </tbody>
</table>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

HI THERE!
</body>
</head>
</html>