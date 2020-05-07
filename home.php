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
$query1 = "SELECT count(*),`State code` FROM `patients` GROUP BY `State code` ORDER BY `State code`";
$sql = "SELECT COUNT(*) FROM patients";
$sql1 = "SELECT COUNT(*),`Status`FROM status GROUP BY `Status` ORDER BY `Status` desc";
$result4 = $conn->query($sql1) or die($conn->error);  
$result1 = $conn->query($query1) or die($conn->error);  
$result2 = $conn->query($sql) or die($conn->error);  
?>
</head>
<body >

<div class="head">
  <h1>COVID-19</h1>
</div>

<div id="navbar">
  <a class="active" href="home.php">Home</a>
  <a href="about.php">About</a>
  <a href="report.php">Report</a>
  <a href="statistics.php">Statistics</a>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/jquery.cbpQTRotator.min.js"></script>
    <script>
      $( function() {
        $( '#cbp-qtrotator' ).cbpQTRotator();

      } );
    </script>
<div class="content">
<div id="myChart" class="chart--container">
    <a class="zc-ref" href="https://www.zingchart.com/"></a>
  </div>
  <script>
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
    let chartConfig = {
      shapes: [{
          type: 'zingchart.maps',
          options: {
            bbox: [67.177, 36.494, 98.403, 6.965], 
            ignore: ['IND'], 
            name: 'world.countries',
            panning: false, 
            style: {
              tooltip: {
                borderColor: '#000',
                borderWidth: '2px',
                fontSize: '18px'
              },
              controls: {
                visible: false 
              },
              hoverState: {
                alpha: .28
              }
            },
            zooming: false 
          }
        },
        {
          type: 'zingchart.maps',
          options: {
            name: 'ind',
            panning: false, // turn of zooming. Doesn't work with bounding box
            zooming: false,
            scrolling: false,
            style: {
              tooltip: {
                borderColor: '#000',
                borderWidth: '2px',
                fontSize: '18px'
              },
              borderColor: '#000',
              borderWidth: '2px',
              controls: {
                visible: false, // turn of zooming. Doesn't work with bounding box

              },
              hoverState: {
                alpha: .28
              },
              items: {
            <?php 
          while(($row = $result1->fetch_row()) !== null){
            if($row['1']=='TG') $row['1']='TL';
         
                echo "{$row['1']}: {";
                echo " tooltip: {";
                echo "    text: '{$row['0']} Cases',";
                echo "    backgroundColor: '#ff5722'";
                echo "  },";
        
        if($row['0'] > 500)
          echo "  backgroundColor: '#f70021',";
        else if($row['0'] < 20)
          echo "  backgroundColor: '#00ff08',";
        else if($row['0'] > 300)
          echo "  backgroundColor: '#ff8800',";
        else if($row['0'] > 200)
          echo "  backgroundColor: '#f0ca22',";
        else if($row['0'] > 100)
          echo "  backgroundColor: '#e5ff00',";
        else if($row['0'] > 20)
          echo "  backgroundColor: '#c7e312',";
                echo "  label: {";
                echo "    visible: true";
                echo "  }";
                echo "},";
          }
                ?>
              },
              label: { // text displaying. Like valueBox
                fontSize: '15px',
                visible: false
              }
            },
            zooming: false // turn of zooming. Doesn't work with bounding box
          }
        }
      ]
    }

    zingchart.loadModules('maps,maps-ind,maps-world-countries');
    zingchart.render({
      id: 'myChart',
      data: chartConfig,
      height: '100%',
      width: '100%',
    });
  </script>
</div>
<div id="footer">
<div id=help>
  <pre>
    Useful Links: <a href="https://www.mohfw.gov.in/pdf/coronvavirushelplinenumber.pdf">HELPLINE NUMBERS</a>        <a href="https://www.mohfw.gov.in/">Government</a>       <a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019">WHO</a>       <a href="https://www.cdc.gov/coronavirus/2019-ncov/faq.html">CDC</a>
  </pre>
</div>
        <div id="helpp">Copyright &copy; 2020 Vishal & Vijay.</div>
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
