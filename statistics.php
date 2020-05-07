<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Blueprint: Quotes Rotator" />
<meta name="keywords" content="quotes rotator, content rotator, jquery, javascript, fade in, fade out, css3, component, html, web development, blockquote" />
<title>COVID-19</title>
<link rel="stylesheet" type="text/css" href="css/defs.css"/>
    <link rel="stylesheet" type="text/css" href="css/defaults.css" />
    <link rel="stylesheet" type="text/css" href="css/components.css" />
<script src="js/modernizr.custom.js"></script>
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<?php
require "db_connect.php";
$sql = "SELECT COUNT(*) FROM patients";
$query1 = "SELECT count(*),`State code` FROM `patients` GROUP BY `State code` ORDER BY `State code` desc";
$query2 = "SELECT count(*),`Date Announced` from `patients` group by `Date Announced` ORDER by COUNT(*);";
$query4 = "SELECT `State code` from `state`";
$result1 = $conn->query($query1) or die($conn->error); 
$result2 = $conn->query($sql) or die($conn->error); 
$result3 = $conn->query($query2) or die($conn->error);
$result5 = $conn->query($query4) or die($conn->error); 

$sql1 = "SELECT COUNT(*),`Gender` FROM patients group by Gender";
$sql2 = "SELECT COUNT(*), `Nationality` FROM `nationality` GROUP BY `Nationality`";
$result6 = $conn->query($sql1) or die($conn->error); 
$result7 = $conn->query($sql2) or die($conn->error);
 
?>
<script>
window.onload = function () {

//vishal
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
			while(($row = $result6->fetch_row())!== null)
			{
				if($row['1']=='') $row['1']='Awaiting Details';
				echo "{ y: {$row['0']}, label: '{$row['1']}' },";
			}
		?>
			]
		}
		]
	});
	chart.render();
	var chart1 = new CanvasJS.Chart("chartContainer1",
	{
		theme: "light2",
		title:{
			text: "Nationality"
		},		
		data: [
		{       
			type: "pie",
			showInLegend: true,
			toolTipContent: "{y} - #percent %",
			legendText: "{indexLabel}",
			dataPoints: [
			<?php
			while(($row = $result7->fetch_row())!== null)
			{
				if($row['1']=='') $row['1']='Awaiting Details';
				echo "{ y: {$row['0']}, label: '{$row['1']}' },";
			}
		?>
			]
		}
		]
	});
	chart1.render();







//vijay
var chart3 = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Date-Wise Infection Growth:"
	},
	axisY:{
		includeZero: false
	},
	data: [{        
		type: "line",
      	indexLabelFontSize: 16,
		dataPoints: [
		<?php
			while(($row = $result3->fetch_row())!== null)
			{
			echo "{ y: {$row['0']} },";
			
			}
			//{ y: 520, indexLabel: "\u2191 highest",markerColor: "red", markerType: "triangle" },
			//{ y: 480 },
			//{ y: 410 , indexLabel: "\u2193 lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
		?>
		]
	}]
});
chart3.render();
var chart4 = new CanvasJS.Chart("chartContainer4", {
	animationEnabled: true,
	title:{
		text: "Most Recovering Age Group:",
		horizontalAlign: "left"
	},
	data: [{
		type: "doughnut",
		startAngle: 60,
		//innerRadius: 60,
		indexLabelFontSize: 17,
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: [
		<?php
		$query5 = "SELECT COUNT(`Patient Number`) FROM `patients` WHERE (Age>1 and Age<20) and `Patient Number` IN (SELECT `Patient Number` FROM `status` WHERE `Status` = 'Recovered')";
		$result6 = $conn->query($query5) or die($conn->error);
		$row = $result6->fetch_row();
			echo "{ y: {$row['0']}, label: 'Age Group:1-20' },";
		$query5 = "SELECT COUNT(`Patient Number`) FROM `patients` WHERE (Age>20 and Age<40) and `Patient Number` IN (SELECT `Patient Number` FROM `status` WHERE `Status` = 'Recovered')";
		$result6 = $conn->query($query5) or die($conn->error);
		$row = $result6->fetch_row();
			echo "{ y: {$row['0']}, label: 'Age Group:20-40' },";
		$query5 = "SELECT COUNT(`Patient Number`) FROM `patients` WHERE (Age>40 and Age<60) and `Patient Number` IN (SELECT `Patient Number` FROM `status` WHERE `Status` = 'Recovered')";
		$result6 = $conn->query($query5) or die($conn->error);
		$row = $result6->fetch_row();
			echo "{ y: {$row['0']}, label: 'Age Group:40-60' },";
		$query5 = "SELECT COUNT(`Patient Number`) FROM `patients` WHERE (Age>60) and `Patient Number` IN (SELECT `Patient Number` FROM `status` WHERE `Status` = 'Recovered')";
		$result6 = $conn->query($query5) or die($conn->error);
		$row = $result6->fetch_row();
			echo "{ y: {$row['0']}, label: 'Age Group:>60' }";
		?>
		]
	}]
});
chart4.render();

var chart5 = new CanvasJS.Chart("chartContainer5", {
	animationEnabled: true,
	title:{
		text: "Most Deaths Age Group:",
		horizontalAlign: "left"
	},
	data: [{
		type: "doughnut",
		startAngle: 60,
		//innerRadius: 60,
		indexLabelFontSize: 17,
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: [
		<?php
		$query5 = "SELECT COUNT(`Patient Number`) FROM `patients` WHERE (Age>1 and Age<20) and `Patient Number` IN (SELECT `Patient Number` FROM `status` WHERE `Status` = 'Deceased')";
		$result6 = $conn->query($query5) or die($conn->error);
		$row = $result6->fetch_row();
			echo "{ y: {$row['0']}, label: 'Age Group:1-20' },";
		$query5 = "SELECT COUNT(`Patient Number`) FROM `patients` WHERE (Age>20 and Age<40) and `Patient Number` IN (SELECT `Patient Number` FROM `status` WHERE `Status` = 'Deceased')";
		$result6 = $conn->query($query5) or die($conn->error);
		$row = $result6->fetch_row();
			echo "{ y: {$row['0']}, label: 'Age Group:20-40' },";
		$query5 = "SELECT COUNT(`Patient Number`) FROM `patients` WHERE (Age>40 and Age<60) and `Patient Number` IN (SELECT `Patient Number` FROM `status` WHERE `Status` = 'Deceased')";
		$result6 = $conn->query($query5) or die($conn->error);
		$row = $result6->fetch_row();
			echo "{ y: {$row['0']}, label: 'Age Group:40-60' },";
		$query5 = "SELECT COUNT(`Patient Number`) FROM `patients` WHERE (Age>60) and `Patient Number` IN (SELECT `Patient Number` FROM `status` WHERE `Status` = 'Deceased')";
		$result6 = $conn->query($query5) or die($conn->error);
		$row = $result6->fetch_row();
			echo "{ y: {$row['0']}, label: 'Age Group:>60' }";
		?>
		]
	}]
});
chart5.render();
}
</script>
</head>
<body >

<div class="head">
  <h1>COVID-19</h1>
</div>

<div id="navbar">
  <a href="home.php">Home</a>
  <a href="about.php">About</a>
  <a href="report.php">Report</a>
<a class="active" href="statistics.php">Statistics</a>
</div>
<div class="live" align="right">
  <span class="blink">Live Updates</span><br>
    <?php
  $row = $result2->fetch_row();
  echo "No of cases: {$row['0']}"; 
  ?>
  </div>
  <div>
        <div id="cbp-qtrotator" class="cbp-qtrotator">
          <div class="cbp-qtcontent">
            <blockquote>
              <p>Lockdown means LOCKDOWN! Avoid going out unless absolutely necessary. Stay safe!</p>
            </blockquote>
          </div>
          <div class="cbp-qtcontent">
            <blockquote>
              <p>Stand against FAKE news and illegit WhatsApp forwards! Do NOT ❌ forward a message until you verify the content it contains. </p>
            </blockquote>
          </div>
          <div class="cbp-qtcontent">
            <blockquote>
              <p>If you have symptoms and suspect you have coronavirus - reach out to your doctor or call state helplines. 📞 Get help. </p>
            </blockquote>
          </div>
          <div class="cbp-qtcontent">
            <blockquote>
              <p>Get in touch with your local NGO's and district administration to volunteer for this cause.</p>
            </blockquote>
          </div>
          <div class="cbp-qtcontent">
            <blockquote>
              <p>Help out your employees and domestic workers by not cutting their salaries. Show the true Indian spirit! </p>
            </blockquote>
          </div>
        </div>
      </div>
      <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/jquery.cbpQTRotator.min.js"></script>
    <script>
      $( function() {
        $( '#cbp-qtrotator' ).cbpQTRotator();

      } );
    </script>
<div class="content">
<div id="chartContainer" style="height: 300px; width: 45%;display:inline-block;"></div>
<div id="chartContainer1" style="height: 300px; width: 45%;display:inline-block;"></div>
<div id="chartContainer3" style="height: 370px; width: 100%;display:inline-block;"></div>
<div id="chartContainer4" style="style= height: 300px; width: 45%;display:inline-block;"></div>
<div id="chartContainer5" style="style=height: 300px; width: 45%;display:inline-block; "></div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div id="footer">
<div id=help>
  <pre>
    Useful Links: <a href="https://www.mohfw.gov.in/pdf/coronvavirushelplinenumber.pdf">HELPLINE NUMBERS</a>        <a href="https://www.mohfw.gov.in/">Government</a>       <a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019">WHO</a>       <a href="https://www.cdc.gov/coronavirus/2019-ncov/faq.html">CDC</a>
  </pre>
</div>
        <div id="helpp">Copyright &copy; 2020 Vishal & Vijay.</div>
</div>
</div>
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
$("#slideshow > div:gt(0)").hide();

setInterval(function() {
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
}, 3000);
</script>

</body>
</html>
