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
    $exp4 = explode("," , $skill); 
    $prof = $row['prof'];       
    $exp2 = explode("," , $prof); 
    $text=$row['details'];
    $text = str_replace("\n", '<br/>', $text);
?>
<?php
$pin=$row['pincode'];
$kyurie="SELECT * FROM pincode WHERE pincode = $pin";
$result1 = mysqli_query($conn,$kyurie);
while($row1 = mysqli_fetch_array($result1)) {

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

	<title>Resume</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<meta name="keywords" content="" />
	<meta name="description" content="" />

	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> 
	<link rel="stylesheet" type="text/css" href="resume.css" media="all" />

</head>
<body>
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
<div id="doc2" class="yui-t7">
	<div id="inner">
	
		<div id="hd">
			<div class="yui-gc">
				<div class="yui-u first">
					<h1><?php echo $row['name']; ?></h1>
					
				</div>

				<div class="yui-u">
					<div class="contact-info">
						<h3 class="noprint" style="cursor: pointer;"><a id="pdf" onclick="window.print();window.location.href='index.html';">Download PDF</a></h3>
						<h3><?php echo $row['email']; ?></h3>
                        <h3><?php echo $row['phone']; ?></h3>
                        <h3><?php echo $row['address'];  ?></h3>
                        <h3><?php  echo $row1['district']; echo ',';  echo $row1['state'];   echo ','; echo $row['pincode'];  ?></h3>
					</div><!--// .contact-info -->
				</div>
			</div><!--// .yui-gc -->
		</div><!--// hd -->

		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">

				

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Technical Skills</h2>
						</div>
						<div class="yui-u">
							<ul class="talent">
					
                                <?php
								   for($i=0;$i<count($exp4)-1;$i++)
								   {
									   echo "<li> $exp4[$i]  ($exp2[$i]) </li><br>";
								   }

                                 ?>

							</ul>
						</div>
					</div><!--// .yui-gf-->

					<div class="yui-gf">
	
						<div class="yui-u first">
							<h2>Experience</h2>
						</div><!--// .yui-u -->

						<div class="yui-u">
							<div class="job">
							<?php 
							for($i=0;$i<count($exp1)-1;$i++)
							{
								echo "<h2> $exp[$i]  </h2>";
								echo "<h3> $exp5[$i]    </h3>";
								 echo "<h3> $exp1[$i]  to   $exp3[$i] </h3><br> ";
								
						    }
						   ?>
						</div>
						</div><!--// .yui-u -->
					</div><!--// .yui-gf -->
						


					<div class="yui-gf last">
						<div class="yui-u first">
							<h2>Education</h2>
						</div>
						<div class="yui-u">
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
					</div><!--// .yui-gf -->

                    <div class="yui-gf">
						<div class="yui-u first">
							<h2>Additional Details</h2>
						</div>
						<div class="yui-u">
							<p class="enlarge">
							<?php echo $text; ?> 
							</p>
						</div>
					</div><!--// .yui-gf -->

				</div><!--// .yui-b -->
			</div><!--// yui-main -->
		</div><!--// bd -->

		<div id="ft">
			<p><?php echo $row['name']; ?>  &mdash; <a href="mailto:<?php echo $row['email']; ?> "><?php echo $row['email']; ?> </a> &mdash;<?php echo $row['phone']; ?> </p>
		</div><!--// footer -->

	</div><!-- // inner -->


</div><!--// doc -->


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