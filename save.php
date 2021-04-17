<?php
if(isset($_POST['name'])){
include 'database.php';

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$dob=$_POST['dob'];
$address=$_POST['address'];
$pincode=$_POST['pincode'];

$school=$_POST['school'];
$sper=$_POST['sper'];
$syear=$_POST['syear'];
$jclg=$_POST['jclg'];
$jper=$_POST['jper'];
$jyear=$_POST['jyear'];
$deg=$_POST['deg'];
$degper=$_POST['degper'];
$dyear=$_POST['dyear'];
$details=$_POST['details'];

$skill ="";
  foreach($_POST["skill"] as $key=>$val){
    if(isset($val) && $val !="")
      $skill.=$val.",";
  }
   $skill=trim($skill);
   

    $prof ="";
    foreach($_POST["prof"] as $key=>$val){
      if(isset($val) && $val !="")
        $prof.=$val.",";
    }
     $prof=trim($prof);
    
     $title ="";
     foreach($_POST["title"] as $key=>$val){
       if(isset($val) && $val !="")
         $title.=$val.",";
     }
      $title=trim($title);

      $cmp ="";
     foreach($_POST["company"] as $key=>$val){
       if(isset($val) && $val !="")
         $cmp.=$val.",";
     }
      $cmp=trim($cmp);

      $sdate ="";
      foreach($_POST["sdate"] as $key=>$val){
        if(isset($val) && $val !="")
          $sdate.=$val.",";
      }
       $sdate=trim($sdate);
       

       $edate ="";
       foreach($_POST["edate"] as $key=>$val){
         if(isset($val) && $val !="")
           $edate.=$val.",";
       }

        $edate=trim($edate);
      


    
     

$sql="insert into info(name,email,phone,dob,address,pincode,school,sper,syear,jclg,jper,jyear,
deg,degper,dyear,title,company,sdate,edate,details,skill,prof) values ('$name','$email','$phone','$dob','$address','$pincode',
'$school','$sper','$syear','$jclg','$jper','$jyear','$deg','$degper','$dyear','$title','$cmp','$sdate','$edate', '$details','$skill','$prof')";

$kyurie=mysqli_query($conn,$sql);

if(!$kyurie)
{
  echo '<script>alert("ERROR OCCURED TRY AGAIN")</script>';
	echo '<script>window.location="form.html"</script>';
}
else{
   // echo '<script>alert("STEP 2 ! CHOOSE A TEMPLATE !")</script>';
	echo '<script>window.location="demo.html"</script>';
}
}
else
header("index.html");
?>