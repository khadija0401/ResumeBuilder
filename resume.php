<?php
include 'database.php';
if(isset($_POST['email'])){
$email=$_POST['email'];

$sql="Select * from info where email='$email'";
$query=mysqli_query($conn,$sql);

if(mysqli_num_rows($query)>0){
while($row = mysqli_fetch_assoc($query)) {
    $title = $row['title'];       
    $exp = explode("," , $title); 
  
 
    $cmp= $row['company'];       
    $exp5 = explode("," , $cmp); 
  

    $sdate = $row['sdate'];       
    $exp1 = explode("," , $sdate); 
 
    

    $edate = $row['edate'];       
    $exp3 = explode("," , $edate); 
  
     

    $skill = $row['skill'];       
    $exp2 = explode("," , $skill); 
    
  
    $prof = $row['prof'];       
    $exp4 = explode("," , $prof); 
   
    
    $text=$row['details'];
    $text = str_replace("\n", '<br/>', $text);
?>
<?php
$pin=$row['pincode'];
$kyurie="SELECT * FROM pincode WHERE pincode = $pin";
$result1 = mysqli_query($conn,$kyurie);
while($row1 = mysqli_fetch_array($result1)) {

?>


<!DOCTYPE html>
<html>
<head>
<title></title>

<meta name="viewport" content="width=device-width"/>
<meta name="description" content="The Curriculum Vitae of Joe Bloggs."/>
<meta charset="UTF-8"> 

<link type="text/css" rel="stylesheet" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700|Lato:400,300' rel='stylesheet' type='text/css'>

<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<style>
	@media print
{
.noprint {display:none;}
}
	</style>
	<script>
		$(window).on("navigate", function (event, data) {
  var direction = data.state.direction;
  if (direction == 'back') {
    window.location.href='login.php';
    event.preventDefault();
  }
});
	</script>
<body id="top">
<div id="cv" class="instaFade">
	<div class="mainDetails">
		<div id="headshot" class="quickFade">
			<img src="headshot.jpg" alt="Alan Smith" />
			<h3 class="noprint" style="cursor: pointer;"><a id="pdf" onclick="window.print();window.location.href='index.html';">Download PDF</a></h3>
		</div>
		
		<div id="name">
			<h1 class="quickFade delayTwo"><?php echo $row['name']; ?></h1>
			
		</div>
		
		<div id="contactDetails" class="quickFade delayFour">
			<ul>
				<li><b>EMAIL:</b> <?php echo $row['email']; ?></li>
				<li>DOB: <?php echo $row['dob']; ?></li>
                <li>PHONE: <?php echo $row['phone']; ?></li>
                <li>Address: <?php echo $row['address']; ?></li>
                <li> <?php echo $row1['district']; echo ',';  echo $row1['state'];   echo ','; echo $row['pincode'];  ?>  </li> 
			</ul>
		</div>
		<div class="clear"></div>
	</div>
	
	<div id="mainArea" class="quickFade delayFive">

    <section>
			<div class="sectionTitle">
				<h1>Education</h1>
			</div>
			
			<div class="sectionContent">
				<article>
					<h2><?php echo $row['deg']; ?>   (DEGREE)</h2>
					<p class="subDetails">CGPI (out of 10) : <?php echo $row['degper']; ?></p>
					<p> Year of Completion : <?php echo $row['dyear']; ?></p>
				</article>
				
				<article>
					<h2><?php echo $row['jclg']; ?>  (HSC)</h2>
					<p class="subDetails">PERCENTAGE : <?php echo $row['jper']; ?></p>
					<p> Year of Completion : <?php echo $row['jyear']; ?></p>
                </article>
                <article>
					<h2><?php echo $row['school']; ?>  (SSC)</h2>
					<p class="subDetails">PERCENTAGE : <?php echo $row['sper']; ?></p>
					<p>Year of Completion : <?php echo $row['syear']; ?></p>
				</article>
			</div>
			<div class="clear"></div>
		</section>
		
		
		
		<section>
			<div class="sectionTitle">
				<h1>Work Experience</h1>
			</div>
			
			<div class="sectionContent">

			<?php 
			for($i=0;$i<count($exp1)-1;$i++)
			{
			echo "<article>";
			echo "<h2> $exp5[$i] </h2>";
			echo "<h4> $exp[$i] </h4>";
			echo "<p class='subDetails'> $exp1[$i] to $exp3[$i] </p><br>";
			echo "</article>";
			}
			?>
				

			</div>
			<div class="clear"></div>
		</section>
		
		
		<section>
			<div class="sectionTitle">
				<h1>Key Skills</h1>
			</div>
			
			<div class="sectionContent">
				<ul class="keySkills">
				<?php
								   for($i=0;$i<count($exp4)-1;$i++)
								   {
									   echo "<li><h2> $exp2[$i]</h2> <p class='subDetails'> $exp4[$i]</p> </li>";
								   }

                                 ?>
					
				</ul>
			</div>
			<div class="clear"></div>
		</section>
		
		
		<section>
			<article>
				<div class="sectionTitle">
					<h1>Additional Details</h1>
				</div>
				
				<div class="sectionContent">
					<p><?php echo $text; ?> </p>
				</div>
			</article>
			<div class="clear"></div>
		</section>
		
	</div>
</div>

</body>
</html>
<?php
}
}
}
else 
{
	echo '<script> alert( " No email found!")</script>';
	echo '<script>window.location="login.php"</script>';}

}
?>