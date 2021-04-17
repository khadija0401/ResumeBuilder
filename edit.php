<?php
session_start();
include "database.php";
if($_SESSION['logged'] == true){ 

// $_SESSION['email']=$email;
$email=$_SESSION['email'];
//echo $email;
$sql="Select * from info where email='$email'";
$query=mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){
while($row = mysqli_fetch_array($query)) {
    $title = $row['title'];       
   $exp = explode("," , $title); 
   $t1=$exp[0];
 
    $cmp= $row['company'];       
    $exp5 = explode("," , $cmp); 
   $c1= $exp5[0];

   $sdate = $row['sdate'];       
    $exp1 = explode("," , $sdate); 
$d=$exp1[0];

   $edate = $row['edate'];       
    $exp3 = explode("," , $edate); 
    $e=$exp3[0];

    $skill = $row['skill'];       
    $exp2 = explode("," , $skill); 
    $sk=$exp2[0];
  
    $prof = $row['prof'];       
    $exp4 = explode("," , $prof); 
    $pr=$exp4[0];
   
    
    $text=$row['details'];
    $text = str_replace("\n", '<br/>', $text);
?>

<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
.stages {
	font-size: 0;
	text-align: justify;
}

.stages:after {
	content: '';
	display: inline-block;
	font-size: 0;
	text-align: justify;
	width: 100%;
}

input[type="radio"] {
	display: none;
}

.stages label {
	background: #ffffff;
	border: solid 5px #c0c0c0;
	border-radius: 50%;
	cursor: pointer;
	display: inline-block;
	font-size: 0;
	font-weight: 700;
	height: 50px;
	line-height: 50px;
	position: relative;
	text-align: center;
	vertical-align: top;
	width: 50px;
	z-index: 1;
	-webkit-touch-callout: none;
	-webkit-user-select: none;
	-khtml-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}

.stages label:after {
	content: '\2713';
	color: #0cc39f;
	display: inline-block;
	font-size: 16px;
}

#one:checked ~ .stages label[for="one"],
#two:checked ~ .stages label[for="two"],
#three:checked ~ .stages label[for="three"],
#four:checked ~ .stages label[for="four"],
#five:checked ~ .stages label[for="five"],
#six:checked ~ .stages label[for="six"] {
	border-color: #0cc39f;
}

.stages label.active{
	border-color: purple !important;
}

#one:checked ~ .stages label,
#two:checked ~ .stages label[for="one"] ~ label,
#three:checked ~ .stages label[for="two"] ~ label,
#four:checked ~ .stages label[for="three"] ~ label,
#five:checked ~ .stages label[for="four"] ~ label,
#six:checked ~ .stages label[for="five"] ~ label {
	font-size: 1rem;
}

#one:checked ~ .stages label:after,
#two:checked ~ .stages label[for="one"] ~ label:after,
#three:checked ~ .stages label[for="two"] ~ label:after,
#four:checked ~ .stages label[for="three"] ~ label:after,
#five:checked ~ .stages label[for="four"] ~ label:after,
#six:checked ~ .stages label[for="five"] ~ label:after {
	display: none;
}

.progress > span {
	background: #c0c0c0;
	display: inline-block;
	height: 5px;
	transform: translateY(-2.75em);
	transition: 0.3s;
	width: 0;
}

#two:checked ~ .progress span {
	width: calc(100% / 5 * 1);
}

#three:checked ~ .progress span {
	width: calc(100% / 5 * 2);
}

#four:checked ~ .progress span {
	width: calc(100% / 5 * 3);
}

#five:checked ~ .progress span {
	width: calc(100% / 5 * 4);
}

#six:checked ~ .progress span {
	width: calc(100% / 5 * 5);
}

.panels div {
	display: none;
}

#one:checked ~ .panels [data-panel="one"],
#two:checked ~ .panels [data-panel="two"],
#three:checked ~ .panels [data-panel="three"],
#four:checked ~ .panels [data-panel="four"],
#five:checked ~ .panels [data-panel="five"],
#six:checked ~ .panels [data-panel="six"] {
	display: block;
}
/* Custom code for the demo */

html,
button,
input,
select,
textarea {
	font-family: "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
}

body {
	background-color: #0cc39f;
	margin: 0;
	padding: 0 2em;
}

a {
	color: #0cc39f;
}

h2,
h4 {
	margin-top: 0;
}

.form {
	background: #ffffff;
	box-shadow: 0 5px 10px rgba(0, 0, 0, .4);
	margin: 4em;
	min-width: 480px;
  padding: 1em;
  margin-top: -20px;
}

.panels div {
	border-top: solid 1px #c0c0c0;
	margin: 1em 0 0;
	padding: 1em 0 0;
}

input {
	box-sizing: border-box;
	display: block;
	padding: .4em;
	width: 100%;
}

button {
	background-color: #0cc39f;
	border: 0;
	color: #ffffff;
	cursor: pointer;
	font-weight: 700;
	margin: 1em 0 0 0;
	padding: 1em;
}

button:hover {
	opacity: 0.8;
}
.logo{
  height: 130px;
  width: 230px;
  float: left;
  background-color:#0cc39f ;
}
</style>
<title>Registration Page</title>
</head>
<body>
<!-- <i class="material-icons" style="font-size:120px;color:white;">assignment</i>
<h1 style="float: left; color: white;">STEP 1</h1> -->
<form id="regForm" action="saveedit.php" method="POST" >
  <!-- One "tab" for each step in the form: -->
  <div class="tab" data-panel="one">
    <h1>Personal Information</h1>
    <p><input placeholder="Name..." oninput="this.className = ''" name="name" value="<?php echo $row['name']; ?>"></p>
    <p><input placeholder="Email ID..." oninput="this.className = ''" name="email" type="email" value="<?php echo $row['email']; ?>" ></p>
    <p><input placeholder="9999999999" oninput="this.className = ''" name="phone" type="tel" pattern="{0-9}[10]"  value="<?php echo $row['phone']; ?>"></p>
    <p><input placeholder="Date of Birth..." oninput="this.className = ''" name="dob" type="date" value="<?php echo $row['dob']; ?>"></p>
    <p><input placeholder="Address Line 1..." oninput="this.className = ''" name="address" value="<?php echo $row['address']; ?>"></p>
    <p><input placeholder="Pincode..." oninput="this.className = ''" name="pincode" type="phone" onblur="showUser(this.value)" value="<?php echo $row['pincode']; ?>"></p>
    <!-- <p><input placeholder="City..." oninput="this.className = ''" name="city"></p>
    <p><input placeholder="State..." oninput="this.className = ''" name="state"></p> -->
    <div id="txtHint"></div>
    
  </div>
  <div class="tab" data-panel="two">
    <h1>Educational Qualifications</h1>
    <p><input placeholder="10th School name..." oninput="this.className = ''" name="school" value="<?php echo $row['school']; ?>"></p>
    <p><input placeholder="10th %..." oninput="this.className = ''" name="sper" value="<?php echo $row['sper']; ?>"></p>
    <p><input placeholder="Passout year..." oninput="this.className = ''" name="syear" value="<?php echo $row['syear']; ?>"></p>
    <p><input placeholder="12th School name..." oninput="this.className = ''" name="jclg" value="<?php echo $row['jclg']; ?>"></p>
    <p><input placeholder="12th %..." oninput="this.className = ''" name="jper" value="<?php echo $row['jper']; ?>"></p>
    <p><input placeholder="Passout year..." oninput="this.className = ''" name="jyear" value="<?php echo $row['jyear']; ?>"></p>
    <p><input placeholder="Course name..." oninput="this.className = ''" name="deg" value="<?php echo $row['deg']; ?>"></p>
    <p><input placeholder="Marks/CGPI..." oninput="this.className = ''" name="degper" value="<?php echo $row['degper']; ?>"></p>
    <p><input placeholder="Passout year/Pursuing..." oninput="this.className = ''" name="dyear" value="<?php echo $row['dyear']; ?>"></p>
  </div>
  <div class="tab" data-panel="three">
    <h1>Past Experience</h1>
    
    <p><input placeholder="Company Name" oninput="this.className = ''" name="company[]" value="<?php echo $c1; ?>"></p>
    <p><input placeholder="Job/Internship Title" oninput="this.className = ''" name="title[]" value="<?php echo $t1; ?>" ></p>
    <p><input placeholder="start month." oninput="this.className = ''" name="sdate[]" type="month" value="<?php echo $d; ?>"></p>
    <p><input placeholder="end date..." oninput="this.className = ''" name="edate[]" type="month" value="<?php echo $e; ?>"></p>
    <br>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div id="new_chq"></div>
    <input type="hidden" value="1" id="total_chq" >
    <br>
    <input type="button" onclick="add1()" value="Add More"> <br><br>
    <input type="button" onclick="remove1()" value="Remove" > <br><br>

    <h1>Additional Details</h1>
    <textarea name="details" style="width:250px;height:150px;" ></textarea>
  </div>

  <div class="tab" data-panel="four">
    <h1>Skills</h1>
   
    <p><label for="Skill">Choose a Skill:</label></p>
    <p><select   placeholder="Skill name..." oninput="this.className = ''" name="skill[]" style="padding: 10px;
      width: 50%;
      font-size: 17px;
      font-family: Raleway;
      border: 1px solid #685d5d;" value="<?php echo $sk; ?>">
      <option value="HTML">HTML</option>
      <option value="CSS">CSS</option>
      <option value="PHP">PHP</option>
      <option value="JS">JS</option>
      <option value="JAVA">JAVA</option>
      <option value="PYTHON">PYTHON</option>
      <option value="PEARL">PEARL</option>
      <option value="RUBY">RUBY</option>
      <option value="ANDROID">ANDROID</option>
      <option value="SQL">SQL</option>
      <option value="C-PROGRAMMING">C-PROGRAMMING</option>
      <option value="C++">C++</option>
      <option value="ENGLISH PROFICIENCY ( SPOKEN )">ENGLISH PROFICIENCY ( SPOKEN )</option>
      <option value="ENGLISH PROFICIENCY ( WRITTEN )">ENGLISH PROFICIENCY ( WRITTEN )</option>
      
    </select></p>
   <p><label for="Skill">Proficiency:</label></p>
    <p><select   placeholder="Proficiency.." oninput="this.className = ''" name="prof[]" style="padding: 10px;
      width: 50%;
      font-size: 17px;
      font-family: Raleway;
      border: 1px solid #aaaaaa;" value="<?php echo $pr; ?>">
      <option value="Expert">Expert</option>
      <option value="Intermediate">Intermediate</option>
      <option value="Beginer">Beginer</option>
      
    </select></p>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div id="new_chq1"></div>
   <br> <input type="hidden" value="1" id="total_chq1" >
    
    <input type="button" onclick="add()" value="Add More"> <br><br>
    <input type="button" onclick="remove()" value="Remove" > <br><br>
   
  
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    
  </div>
</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

function add(){
      var new_chq_no = parseInt($('#total_chq1').val())+1;
      var new_input="<br></p><select  id='new_"+new_chq_no+"'   name='skill[]' style='padding: 10px;  width: 50%;    font-size: 17px;  font-family: Raleway;  border: 1px solid #685d5d;'><option value='HTML'>HTML</option>   <option value='CSS'>CSS</option> <option value='PHP'>PHP</option><option value='JS'>JS</option><option value='JAVA>JAVA</option> <option value='PYTHON'>PYTHON</option>   <option value='PEARL'>PEARL</option> <option value='RUBY'>RUBY</option>   <option value='ANDROID'>ANDROID</option>  <option value='SQL'>SQL</option>  <option value='C-PROGRAMMING'>C-PROGRAMMING</option> <option value='C++'>C++</option>  <option value='ENGLISH PROFICIENCY ( SPOKEN )'>ENGLISH PROFICIENCY ( SPOKEN )</option> <option value='ENGLISH PROFICIENCY ( WRITTEN )'>ENGLISH PROFICIENCY ( WRITTEN )</option> </select>";
      $('#new_chq1').append(new_input);
      $('#total_chq1').val(new_chq_no)

      var new_input="<br><select  id='new_"+new_chq_no+"'  name='prof[]' style='padding: 10px;  width: 50%;    font-size: 17px;  font-family: Raleway;  border: 1px solid #685d5d;'>   <option value='Expert'>Expert</option> <option value='Intermediate'>Intermediate</option><option value='Beginer'>Beginer</option></select>";
      $('#new_chq1').append(new_input);
      $('#total_chq1').val(new_chq_no)
    }
    function remove(){
      
        var last_chq_no = $('#total_chq1').val();
      if(last_chq_no>1){
        $('#new_'+last_chq_no).remove();
        $('#total_chq1').val(last_chq_no-1);
        $('#new_'+last_chq_no).remove();
        $('#total_chq1').val(last_chq_no-1);
      }
    }


    function add1(){
      var new_chq_no = parseInt($('#total_chq').val())+1;
      var new_input="<br><input type='text' id='new_"+new_chq_no+"' placeholder='Company Name' name='company[]' >";
      $('#new_chq').append(new_input);
      $('#total_chq').val(new_chq_no)

      var new_input="<br><input type='text' id='new_"+new_chq_no+"' placeholder='Job/Internship Title' name='title[]' >";
      $('#new_chq').append(new_input);
      $('#total_chq').val(new_chq_no)

      var new_input="<br><input type='month' id='new_"+new_chq_no+"' placeholder='Start Date' name='sdate[]'>";
      $('#new_chq').append(new_input);
      $('#total_chq').val(new_chq_no)

      var new_input="<br><input type='month' id='new_"+new_chq_no+"' placeholder='End Date Date' name='edate[]' >";
      $('#new_chq').append(new_input);
      $('#total_chq').val(new_chq_no)
    }
    function remove1(){
      var last_chq_no = $('#total_chq').val();
      if(last_chq_no>1){
        $('#new_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
        $('#new_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
        $('#new_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
        $('#new_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
      }
    }

    function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","ajax.php?q="+str,true);
    xmlhttp.send();
  }
}
















</script>

</body>
</html>








    <?php
 }
}
else
{
  echo '<script>window.location="form.html"</script>';
}
}
 else{
    
     header("index.php");
 }
 ?>

