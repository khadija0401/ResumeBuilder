<?php

include 'database.php';

$u=$_GET['u'];
$kyurie="select * from login_details where email = '".$u."'";
$result1=mysqli_query($conn,$kyurie);
while($row = mysqli_fetch_array($result1)) {
  if($row['email'] == $u)
  {
    echo 'Username Already Exists';
  }
}
mysqli_close($conn);
?>