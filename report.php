<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Report</title>
<link rel="stylesheet" type="text/css" href="css/defs.css"/>
<link rel="stylesheet" type="text/css" href="css/form.css"/>
<link rel="stylesheet" type="text/css" href="css/defaults.css" />
<link rel="stylesheet" type="text/css" href="css/components.css" />
<script src="js/modernizr.custom.js"></script>
<?php 
require "db_connect.php";
if(isset($_REQUEST['field1'])){
$user = $_REQUEST['field1'];
$date = $_REQUEST['field3'];
$age = $_REQUEST['field4'];
$gender = $_REQUEST['field9'];
$state = $_REQUEST['field5'];
//$statec = $_REQUEST['field1'];		//trigger
$status = $_REQUEST['field6'];
$notes = $_REQUEST['field8'];
$nationality = $_REQUEST['field7'];
$tot = $_REQUEST['field1'];			//trigger
$query2 = "select `State code` from `state` where `Detected State` = '$state'";
$result2 = $conn->query($query2) or die($conn->error);
$row = $result2->fetch_row();
$statec = $row['0'];
$query1 = "INSERT INTO `new_entries` VALUES ('$user','$date','$age','$gender','$state','$statec','$status','$notes','$nationality','$tot')";
$result1 = $conn->query($query1) or die($conn->error);

}
 ?>
</head>
<body style="background-color:#959E8C;">
<div class="head">
  <h1>Report</h1>
</div>
<div id="navbar">
  <a href="home.php">Home</a>
  <a href="about.php">About</a>
  <a class="active" href="report.php">Report</a>
<a href="statistics.php">Statistics</a>
</div>
 
<div class="live" align="right">
  <span class="blink">Live Updates</span><br>
    <?php
	$sql = "SELECT COUNT(*) FROM patients";
$result3 = $conn->query($sql) or die($conn->error);
  $row = $result3->fetch_row();
  echo "No of cases: {$row['0']}"; 
  ?>
  </div>
  <br>
<div>
        <div id="cbp-qtrotator" class="cbp-qtrotator" style="color: white;">
          <div class="cbp-qtcontent">
            <blockquote style="color: white;">
              <p style="color: white;">Lockdown means LOCKDOWN! Avoid going out unless absolutely necessary. Stay safe!</p>
            </blockquote>
          </div>
          <div class="cbp-qtcontent">
            <blockquote style="color: white;">
              <p style="color: white;">Stand against FAKE news and illegit WhatsApp forwards! Do NOT âŒ forward a message until you verify the content it contains. </p>
            </blockquote>
          </div>
          <div class="cbp-qtcontent">
            <blockquote style="color: white;">
              <p style="color: white;">If you have symptoms and suspect you have coronavirus - reach out to your doctor or call state helplines. ðŸ“ž Get help. </p>
            </blockquote>
          </div>
          <div class="cbp-qtcontent">
            <blockquote style="color: white;">
              <p style="color: white;">Get in touch with your local NGO's and district administration to volunteer for this cause.</p>
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
	<br><br><br><br><br><br><br>
  <div id="tex">
    <p style="font-size: 20px;">A major issue for authorities in trying to contain this pandemic is that circulation of information from the people to the health officials is either very slow or just non- existent to solve this issue, the report page has been set up to notify the health officials of any cases of the novel coronavirus in the area.
    If the correct information can be spread faster than the Coronavirus itself then hundreds of lives can be saved and finally we can put an end to this pandemic. <br><br><b>So please help us by filling this form only if you are sure about the information.</b></p>
  </div>
<div class="form-style-5">
<form name="details" method="post">
<fieldset>
<legend><span class="number">1</span> Your Info</legend>
<input type="text" name="field1" placeholder="Your Name *" required>
<input type="email" name="field2" placeholder="Your Email *">
<textarea name="field3" placeholder="Address"></textarea>   
</fieldset>
<fieldset>
<legend><span class="number">2</span> Patients Info</legend>
<input type="date" name="field3" placeholder="Date:" required></input>
<input type="number" name="field4" placeholder="Age" required></input>
<input type="radio" id="male" name="field9" value="M" checked>
 <label for="male">Male</label></input>
  <input type="radio" id="female" name="field9" value="F">
  <label for="female">Female</label><br>
  <label for="state">State:</label>
<select id="state" name="field5" required>
  <option value="">-- select one --</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
</select><br>
 <label for="Status">Current Status:</label>
<select id="Status" name="field6" required>
  <option value="">-- select one --</option>
  <option value="Recovered">Recovered</option>
<option value="Hospitalized">Hospitalized</option>
<option value="Deceased">Deceased</option>
</select>
<label for="nationality">Nationality:</label>
<select id="nationality" name="field7" required>
  <option value="">-- select one --</option>
  <option value="afghan">Afghan</option>
  <option value="albanian">Albanian</option>
  <option value="algerian">Algerian</option>
  <option value="american">American</option>
  <option value="andorran">Andorran</option>
  <option value="angolan">Angolan</option>
  <option value="antiguans">Antiguans</option>
  <option value="argentinean">Argentinean</option>
  <option value="armenian">Armenian</option>
  <option value="australian">Australian</option>
  <option value="austrian">Austrian</option>
  <option value="azerbaijani">Azerbaijani</option>
  <option value="bahamian">Bahamian</option>
  <option value="bahraini">Bahraini</option>
  <option value="bangladeshi">Bangladeshi</option>
  <option value="barbadian">Barbadian</option>
  <option value="barbudans">Barbudans</option>
  <option value="batswana">Batswana</option>
  <option value="belarusian">Belarusian</option>
  <option value="belgian">Belgian</option>
  <option value="belizean">Belizean</option>
  <option value="beninese">Beninese</option>
  <option value="bhutanese">Bhutanese</option>
  <option value="bolivian">Bolivian</option>
  <option value="bosnian">Bosnian</option>
  <option value="brazilian">Brazilian</option>
  <option value="british">British</option>
  <option value="bruneian">Bruneian</option>
  <option value="bulgarian">Bulgarian</option>
  <option value="burkinabe">Burkinabe</option>
  <option value="burmese">Burmese</option>
  <option value="burundian">Burundian</option>
  <option value="cambodian">Cambodian</option>
  <option value="cameroonian">Cameroonian</option>
  <option value="canadian">Canadian</option>
  <option value="cape verdean">Cape Verdean</option>
  <option value="central african">Central African</option>
  <option value="chadian">Chadian</option>
  <option value="chilean">Chilean</option>
  <option value="chinese">Chinese</option>
  <option value="colombian">Colombian</option>
  <option value="comoran">Comoran</option>
  <option value="congolese">Congolese</option>
  <option value="costa rican">Costa Rican</option>
  <option value="croatian">Croatian</option>
  <option value="cuban">Cuban</option>
  <option value="cypriot">Cypriot</option>
  <option value="czech">Czech</option>
  <option value="danish">Danish</option>
  <option value="djibouti">Djibouti</option>
  <option value="dominican">Dominican</option>
  <option value="dutch">Dutch</option>
  <option value="east timorese">East Timorese</option>
  <option value="ecuadorean">Ecuadorean</option>
  <option value="egyptian">Egyptian</option>
  <option value="emirian">Emirian</option>
  <option value="equatorial guinean">Equatorial Guinean</option>
  <option value="eritrean">Eritrean</option>
  <option value="estonian">Estonian</option>
  <option value="ethiopian">Ethiopian</option>
  <option value="fijian">Fijian</option>
  <option value="filipino">Filipino</option>
  <option value="finnish">Finnish</option>
  <option value="french">French</option>
  <option value="gabonese">Gabonese</option>
  <option value="gambian">Gambian</option>
  <option value="georgian">Georgian</option>
  <option value="german">German</option>
  <option value="ghanaian">Ghanaian</option>
  <option value="greek">Greek</option>
  <option value="grenadian">Grenadian</option>
  <option value="guatemalan">Guatemalan</option>
  <option value="guinea-bissauan">Guinea-Bissauan</option>
  <option value="guinean">Guinean</option>
  <option value="guyanese">Guyanese</option>
  <option value="haitian">Haitian</option>
  <option value="herzegovinian">Herzegovinian</option>
  <option value="honduran">Honduran</option>
  <option value="hungarian">Hungarian</option>
  <option value="icelander">Icelander</option>
  <option value="indian">Indian</option>
  <option value="indonesian">Indonesian</option>
  <option value="iranian">Iranian</option>
  <option value="iraqi">Iraqi</option>
  <option value="irish">Irish</option>
  <option value="israeli">Israeli</option>
  <option value="italian">Italian</option>
  <option value="ivorian">Ivorian</option>
  <option value="jamaican">Jamaican</option>
  <option value="japanese">Japanese</option>
  <option value="jordanian">Jordanian</option>
  <option value="kazakhstani">Kazakhstani</option>
  <option value="kenyan">Kenyan</option>
  <option value="kittian and nevisian">Kittian and Nevisian</option>
  <option value="kuwaiti">Kuwaiti</option>
  <option value="kyrgyz">Kyrgyz</option>
  <option value="laotian">Laotian</option>
  <option value="latvian">Latvian</option>
  <option value="lebanese">Lebanese</option>
  <option value="liberian">Liberian</option>
  <option value="libyan">Libyan</option>
  <option value="liechtensteiner">Liechtensteiner</option>
  <option value="lithuanian">Lithuanian</option>
  <option value="luxembourger">Luxembourger</option>
  <option value="macedonian">Macedonian</option>
  <option value="malagasy">Malagasy</option>
  <option value="malawian">Malawian</option>
  <option value="malaysian">Malaysian</option>
  <option value="maldivan">Maldivan</option>
  <option value="malian">Malian</option>
  <option value="maltese">Maltese</option>
  <option value="marshallese">Marshallese</option>
  <option value="mauritanian">Mauritanian</option>
  <option value="mauritian">Mauritian</option>
  <option value="mexican">Mexican</option>
  <option value="micronesian">Micronesian</option>
  <option value="moldovan">Moldovan</option>
  <option value="monacan">Monacan</option>
  <option value="mongolian">Mongolian</option>
  <option value="moroccan">Moroccan</option>
  <option value="mosotho">Mosotho</option>
  <option value="motswana">Motswana</option>
  <option value="mozambican">Mozambican</option>
  <option value="namibian">Namibian</option>
  <option value="nauruan">Nauruan</option>
  <option value="nepalese">Nepalese</option>
  <option value="new zealander">New Zealander</option>
  <option value="ni-vanuatu">Ni-Vanuatu</option>
  <option value="nicaraguan">Nicaraguan</option>
  <option value="nigerien">Nigerien</option>
  <option value="north korean">North Korean</option>
  <option value="northern irish">Northern Irish</option>
  <option value="norwegian">Norwegian</option>
  <option value="omani">Omani</option>
  <option value="pakistani">Pakistani</option>
  <option value="palauan">Palauan</option>
  <option value="panamanian">Panamanian</option>
  <option value="papua new guinean">Papua New Guinean</option>
  <option value="paraguayan">Paraguayan</option>
  <option value="peruvian">Peruvian</option>
  <option value="polish">Polish</option>
  <option value="portuguese">Portuguese</option>
  <option value="qatari">Qatari</option>
  <option value="romanian">Romanian</option>
  <option value="russian">Russian</option>
  <option value="rwandan">Rwandan</option>
  <option value="saint lucian">Saint Lucian</option>
  <option value="salvadoran">Salvadoran</option>
  <option value="samoan">Samoan</option>
  <option value="san marinese">San Marinese</option>
  <option value="sao tomean">Sao Tomean</option>
  <option value="saudi">Saudi</option>
  <option value="scottish">Scottish</option>
  <option value="senegalese">Senegalese</option>
  <option value="serbian">Serbian</option>
  <option value="seychellois">Seychellois</option>
  <option value="sierra leonean">Sierra Leonean</option>
  <option value="singaporean">Singaporean</option>
  <option value="slovakian">Slovakian</option>
  <option value="slovenian">Slovenian</option>
  <option value="solomon islander">Solomon Islander</option>
  <option value="somali">Somali</option>
  <option value="south african">South African</option>
  <option value="south korean">South Korean</option>
  <option value="spanish">Spanish</option>
  <option value="sri lankan">Sri Lankan</option>
  <option value="sudanese">Sudanese</option>
  <option value="surinamer">Surinamer</option>
  <option value="swazi">Swazi</option>
  <option value="swedish">Swedish</option>
  <option value="swiss">Swiss</option>
  <option value="syrian">Syrian</option>
  <option value="taiwanese">Taiwanese</option>
  <option value="tajik">Tajik</option>
  <option value="tanzanian">Tanzanian</option>
  <option value="thai">Thai</option>
  <option value="togolese">Togolese</option>
  <option value="tongan">Tongan</option>
  <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
  <option value="tunisian">Tunisian</option>
  <option value="turkish">Turkish</option>
  <option value="tuvaluan">Tuvaluan</option>
  <option value="ugandan">Ugandan</option>
  <option value="ukrainian">Ukrainian</option>
  <option value="uruguayan">Uruguayan</option>
  <option value="uzbekistani">Uzbekistani</option>
  <option value="venezuelan">Venezuelan</option>
  <option value="vietnamese">Vietnamese</option>
  <option value="welsh">Welsh</option>
  <option value="yemenite">Yemenite</option>
  <option value="zambian">Zambian</option>
  <option value="zimbabwean">Zimbabwean</option>
</select>
<textarea name="field8" placeholder="Notes"></textarea>  
</fieldset>
<input type="submit" value="Apply" />
</form>
</div>
<div id="footer">
<div id=help>
  <pre>
    Useful Links: <a href="https://www.mohfw.gov.in/pdf/coronvavirushelplinenumber.pdf">HELPLINE NUMBERS</a>        <a href="https://www.mohfw.gov.in/">Government</a>       <a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019">WHO</a>       <a href="https://www.cdc.gov/coronavirus/2019-ncov/faq.html">CDC</a>
  </pre>
</div>
        <div id="helpp">Copyright &copy; 2020 Vishal & Vijay.</div>
</div>
</div>
</body>
</html>