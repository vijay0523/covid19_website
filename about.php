<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>About us</title>
<link rel="stylesheet" type="text/css" href="css/defs.css"/>
<link rel="stylesheet" type="text/css" href="css/defaults.css" />
    <link rel="stylesheet" type="text/css" href="css/components.css" />
<script src="js/modernizr.custom.js"></script>
<?php 
require "db_connect.php";
$sql = "SELECT COUNT(*) FROM patients";
$result4 = $conn->query($sql) or die($conn->error);  
 ?>
</head>
<body>

<div class="head">
  <h1>About</h1>
</div>

<div id="navbar">
  <a href="home.php">Home</a>
  <a class="active" href="about.php">About</a>
  <a href="report.php">Report</a>
  <a href="statistics.php">Statistics</a>
</div>
<div class="live" align="right">
  <span class="blink">Live Updates</span><br>
    <?php
  $row = $result4->fetch_row();
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
<br><br><br><br>
<div class="content">
  <h3><b>Overview</b></h3>
  <p>Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus.</p>
  <p>Most people infected with the COVID-19 virus will experience mild to moderate respiratory illness and recover without requiring special treatment.  Older people, and those with underlying medical problems like cardiovascular disease, diabetes, chronic respiratory disease, and cancer are more likely to develop serious illness.</p>
  <p>The best way to prevent and slow down transmission is be well informed about the COVID-19 virus, the disease it causes and how it spreads. Protect yourself and others from infection by washing your hands or using an alcohol based rub frequently and not touching your face. </p>
  <p>The COVID-19 virus spreads primarily through droplets of saliva or discharge from the nose when an infected person coughs or sneezes, so its important that you also practice respiratory etiquette (for example, by coughing into a flexed elbow).</p>
  <p>At this time, there are no specific vaccines or treatments for COVID-19. However, there are many ongoing clinical trials evaluating potential treatments. WHO will continue to provide updated information as soon as clinical findings become available.</p>
  <br><br>
  <h3>Prevention</h3>
  <ul>
    <li>Wash your hands regularly with soap and water, or clean them with alcohol-based hand rub.</li>
    <li>Maintain at least 1 metre distance between you and people coughing or sneezing.</li>
    <li>Avoid touching your face.</li>
    <li>Cover your mouth and nose when coughing or sneezing.</li>
    <li>Stay home if you feel unwell.</li>
    <li>Refrain from smoking and other activities that weaken the lungs.</li>
    <li>Practice physical distancing by avoiding unnecessary travel and staying away from large groups of people.</li>
  </ul>
  <br>
  <h3>Symptoms</h3>
  <p>The COVID-19 virus affects different people in different ways.  COVID-19 is a respiratory disease and most infected people will develop mild to moderate symptoms and recover without requiring special treatment.  People who have underlying medical conditions and those over 60 years old have a higher risk of developing severe disease and death.<p>
<p>Common<b> symptoms </b> include:<p>
<ul>
<li>fever</li>
<li>tiredness</li>
<li>dry cough.</li>
</ul>
<p>Other<b> symptoms </b>include:</p>
<ul>
<li>shortness of breath</li>
<li>aches and pains</li>
<li>sore throat</li>
<li>very few people will report diarrhoea, nausea or a runny nose.</li>
</ul>
<p>People with mild symptoms who are otherwise healthy should self-isolate and contact their medical provider or a COVID-19 information line for advice on testing and referral.<br>

People with fever, cough or difficulty breathing should call their doctor and seek medical attention.</p>
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
