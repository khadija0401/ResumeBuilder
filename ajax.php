<?php
$q = $_GET['q'];

include 'database.php';
$sql="SELECT * FROM pincode WHERE pincode = '".$q."'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
echo '	<input type="text" name="city" id="city" value= '.$row["district"].' disabled><br />';
echo '	<input type="text" name="state" id="state"  value= '.$row["state"].' disabled><br />';
}

mysqli_close($conn);
?>