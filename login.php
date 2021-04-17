<?php
session_start();
include "database.php";

if(isset($_POST['email'])){
$email=$_POST['email'];
$password=$_POST['password'];
$name=$_POST['name'];

$password=md5($password);
$query="select * from login_details where email='$email' && password='$password'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
if($row['email'] == $email && $row['password'] == $password)
{
    echo'<script type="text/javascript">alert("Login successful!!  Welcome");</script>';
    echo '<script> location.href = "demo1.php"; </script> ';
    $_SESSION["email"] = $email;
    $_SESSION["name"] = $name;
    $_SESSION["logged"] = true;
}
else{
    echo'<script type="text/javascript">alert("check your login credentials");</script>';
    echo '<script> location.href = "login.php"; </script> ';
    $_SESSION["logged"] = false;

}


}
?>

<!DOCTYPE html>
<html>
<title>login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<body>

<header class="w3-container w3-light-blue">
<a href="signup.php" class="w3-button w3-section w3-teal w3-ripple" STYLE="float: right;">SIGN UP</a>
  <h1>USER LOGIN</h1>
</header>
<style>
body{
  background-image:url('bg3.jpg');
  background-repeat: no-repeat;
  background-size: cover;
 
opacity: 0.9;

}
</style>
<div class="w3-container w3-half" >

<form class="w3-container w3-card-4" style="margin-top:100px; background:white; box-shadow:lightblue;" method="POST" type="submit" name="submit" value="SUBMIT">
<p>
<label>NAME</label> </p>
<input class="w3-input" type="text" style="width:90%"  style="padding: 10px" name="name" required>

<br>
<p>
<label>USER EMAIL</label> </p>
<input class="w3-input" type="email" style="width:90%"  style="padding: 10px" name="email">
<br>
<p>
<label>PASSWORD</label></p>
<input class="w3-input" type="password" style="width:90%"  name="password" required>

<p>
<button class="w3-button w3-section w3-teal w3-ripple" style="margin-left: 250px;"> Log in </button></p>


</form>



</div>
</body>
</html>