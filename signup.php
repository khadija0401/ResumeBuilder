<?php
include "database.php";

if(isset($_POST['email'])){
$email=$_POST['email'];
$name=$_POST['name'];
$password=$_POST['password'];
$confirmpass=$_POST['confirmpass'];

$confirmpass=md5($confirmpass);
$password=md5($password);
$query="select * from login_details where email='$email'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
if($row['email'] == $email)
{
    echo '<script>alert("You are already a member! Login to continue!")</script>';
    echo '<script>window.location="login.php"</script>';
  }

  else{
    $sql=mysqli_query($conn,"insert into login_details(name,email,password,confirmpass) values ('$name','$email','$password','$confirmpass')");
    if(!$sql)
    {
        echo '<script>alert("ERROR OCCURED TRY AGAIN")</script>';
      echo '<script>window.location="signup.php"</script>';
    }
    else
    { //  echo '<script></script>';
    echo '<script>window.location="form.html"</script>';
    
    }
  }



}

?>
<script>
function check()
{
var pass= document.submit.password.value;
var cf=document.submit.confirmpass.value;
if(pass.length<6)
{
    alert('password should be more than 6 charecters!');
    return false;
}
else if(pass!=cf)
{
  
    alert('ERROR: Your password and confirmation password do not match');
    return false;
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
    xmlhttp.open("GET","ajax2.php?u="+str,true);
    xmlhttp.send();
  }
}
</script>

<!DOCTYPE html>
<html>
<title>SIGN-UP </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
body{
  background-image:url('bg3.jpg');
  background-repeat: no-repeat;
  background-size: cover;
 
opacity: 0.9;

}
</style>
<body>

<header class="w3-container w3-light-blue">
<a href="login.php" class="w3-button w3-section w3-teal w3-ripple" STYLE="float: right;">Login</a>
  <h1>SIGN-UP TO BEGIN</h1>
</header>

<div class="w3-container w3-half"  
>

<form class="w3-container w3-card-4" style="margin-top:100px;background:white; box-shadow:lightblue;" method="POST" type="submit" name="submit" value="SUBMIT" onsubmit="return check();">
<br>
<p>
<label>USER EMAIL</label> </p>
<input class="w3-input" type="email" style="width:90%"  style="padding: 10px" name="email" onblur="showUser(this.value)" required>

<div id="txtHint" style="color: Red;"></div> 
<br>
<p>
<label>NAME</label> </p>

<input class="w3-input" type="text" style="width:90%"  style="padding: 10px" name="name" required>
<br>
<p>
<label>PASSWORD</label></p>
<input class="w3-input" type="password" style="width:90%"  name="password" required>
<br>
<p>
<label>CONFIRM PASSWORD</label></p>
<input class="w3-input" type="password" style="width:90%"  name="confirmpass" required>
<br>
<p>
<button class="w3-button w3-section w3-teal w3-ripple" style="margin-left: 250px;" > Sign Up </button></p>

</form>


</body>
</html>

