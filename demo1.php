<?php
session_start();
include "database.php";
if(!isset($_SERVER['HTTP_REFERER'])){
  // redirect them to your desired location
  header('location:index.html');
  exit;
}
if($_SESSION['logged'] == true){ 
?>


<!DOCTYPE html>
<html lang="en">
<title>RESUME BUILDER</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif; scroll-behavior: smooth;}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}

.zoom:hover {
  -ms-transform: scale(1.3); /* IE 9 */
  -webkit-transform: scale(1.3); /* Safari 3-8 */
  transform: scale(1.3); 
}
h1 {
  text-align: center;  
  font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
.body,html{
    background-color:lightblue;
}
html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  border: 3px solid darkcyan;
  text-align:center ;
}

.container {
  padding: 0 16px;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  color:black;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}



.button {
  border: 2px solid darkcyan;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: black;
  background-color: transparent;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: darkcyan;
  color: whitesmoke;

}
input {
    box-sizing: border-box;
    display: block;
    padding: .4em;
    width: 100%;
}
img:hover{
  -ms-transform: scale(1); /* IE 9 */
  -webkit-transform: scale(1.3); /* Safari 3-8 */
  transform: scale(1.1); 
}

</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-white" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <img src="resume.png" style="height:100px; width:100px; float: left;">
    
    <a class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue"><?php echo 'Welcome  '; echo $_SESSION['name'];?></a>
    <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue" style="float: right;">Logout</a>
    <a href="edit.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-light-blue" style="float: right;">Edit your Details</a>


  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
  <a  class="w3-bar-item w3-button w3-padding-large"><?php echo 'Welcome  '; echo $_SESSION['name'];?></a>
    <a href="edit.php" class="w3-bar-item w3-button w3-padding-large">Edit your Details</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding-large">Logout</a>

  </div>
</div>

<!-- Header -->
<header class="w3-container w3-light-blue w3-center" style="padding:128px 16px">
<div class="row">
        <div class="column">
          <div class="card">
            <img src="1.jpg" alt="CASUAL TEMPLATE" style="width:100% ; border:1px solid black; height: 500px;" >
            <div class="container">
                <h2>CASUAL TEMPLATE</h2>
                <p><span>Re-enter your Email ID to download your resume in the above format</span></p>
                <form method="POST" action="resume2.php" >
                <input type="email" placeholder="Email" name="email" > 
              <p><button class="button" type="submit" value="submit">SUBMIT</button></p>
            </form>
            </div>
          </div>
        </div>
      
        <div class="column">
          <div class="card">
            <img src="2.jpg" alt="SIMPLE TEMPLATE" style="width:100%; border:1px solid black;height: 500px;">
            <div class="container">
              <h2>SIMPLE TEMPLATE</h2>
              <p><span>Re-enter your Email ID to download your resume in the above format</span></p>
              <form method="POST" action="resume1.php" >
              <input type="email" placeholder="Email" name="email" > 
            <p><button class="button" type="submit" value="submit">SUBMIT</button></p>
          </form>
            </div>
          </div>
        </div>
        
        <div class="column">
          <div class="card">
            <img src="3.jpg"  alt="PROFESSIONAL TEMPLATE"style="width:100%; border:1px solid black;height: 500px;">
            <div class="container">
              <h2>PROFESSIONAL TEMPLATE</h2>
              <p><span>Re-enter your Email ID to download your resume in the above format</span></p>
                <form method="POST" action="resume.php" >
                <input type="email" placeholder="Email" name="email" > 
              <p><button class="button" type="submit" value="submit">SUBMIT</button></p>
            </form>
            </div>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <img src="4.JPG" alt="SIMPLE TEMPLATE" style="width:100%; border:1px solid black;height: 500px;">
          <div class="container">
            <h2>BLUE TEMPLATE</h2>
            <p><span>Re-enter your Email ID to download your resume in the above format</span></p>
            <form method="POST" action="./blue/resume3.php" >
            <input type="email" placeholder="Email" name="email" > 
          <p><button class="button" type="submit" value="submit">SUBMIT</button></p>
        </form>
          </div>
        </div>
      </div>
      

      <div class="column">
        <div class="card">
          <img src="5.jpg" alt="SIMPLE TEMPLATE" style="width:100%; border:1px solid black;height: 500px;">
          <div class="container">
            <h2>RED TEMPLATE</h2>
            <p><span>Re-enter your Email ID to download your resume in the above format</span></p>
            <form method="POST" action="./blue/resume4.php" >
            <input type="email" placeholder="Email" name="email" > 
          <p><button class="button" type="submit" value="submit">SUBMIT</button></p>
        </form>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <img src="6.jpg" alt="SIMPLE TEMPLATE" style="width:100%; border:1px solid black;height: 500px;">
          <div class="container">
            <h2>GREEN TEMPLATE</h2>
            <p><span>Re-enter your Email ID to download your resume in the above format</span></p>
            <form method="POST" action="./blue/resume5.php" >
            <input type="email" placeholder="Email" name="email" > 
          <p><button class="button" type="submit" value="submit">SUBMIT</button></p>
        </form>
          </div>
        </div>
      </div>

</header>


<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>











  <?php
}
else{
    header("index.html");
}
?>