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


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

     <title>RESUME</title>

     <style type="text/css">
        * { margin: 0; padding: 0; }
        body { font: 16px Helvetica, Sans-Serif; line-height: 24px; background: url(images/noise.jpg); }
        .clear { clear: both; }
        #page-wrap { width: 800px; margin: 40px auto 60px; }
        #pic { float: right; margin: -30px 0 0 0; }
        h1 { margin: 0 0 16px 0; padding: 0 0 16px 0; font-size: 42px; font-weight: bold; letter-spacing: -2px; border-bottom: 1px solid #999; }
        h2 { font-size: 20px; margin: 0 0 6px 0; position: relative; }
        h2 span { position: absolute; bottom: 0; right: 0; font-style: italic; font-family: Georgia, Serif; font-size: 16px; color: #999; font-weight: normal; }
        p { margin: 0 0 16px 0; }
        a { color: #999; text-decoration: none; border-bottom: 1px dotted #999; }
        a:hover { border-bottom-style: solid; color: black; }
        ul { margin: 0 0 32px 17px; }
        #objective { width: 500px; float: left; }
        #objective p { font-family: Georgia, Serif; font-style: italic; color: #666; }
        dt { font-style: italic; font-weight: bold; font-size: 18px; text-align: right; padding: 0 26px 0 0; width: 150px; float: left; height: 100px; border-right: 1px solid #999;  }
        dd { width: 600px; float: right; }
        dd.clear { float: none; margin: 0; height: 15px; }
     </style>
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
<body>

    <div id="page-wrap">
    
        
    
        <div id="contact-info" class="vcard">
        
            <!-- Microformats! -->
            <h3 class="noprint" style="cursor: pointer;"><a id="pdf" onclick="window.print();window.location.href='index.html';">Download PDF</a></h3><br><br>
            <h1 class="fn"><?php echo $row['name']; ?></h1>
        
            <p>
                Cell: <span class="tel"><?php echo $row['phone']; ?></span><br />
                Email: <a class="email" ><?php echo $row['email']; ?></a><br>
                Address: <span class="tel"><?php echo $row['address'];  ?></span><br />
                <span><?php echo $row1['district']; echo ',';  echo $row1['state'];   echo ','; echo $row['pincode'];  ?></span>

            </p>
        </div>
                   
        <div class="clear"></div>
        
        <dl>
            <dd class="clear"></dd>
            
            <dt style="height:300px;">Education</dt>
            <dd >
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
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Skills</dt>
            <dd>
            <?php
								   for($i=0;$i<count($exp2)-1;$i++)
								   {
									   echo "<li>$exp2[$i] ( $exp4[$i] ) </li>";
								   }

                                 ?>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt style="height:450px;">Experience</dt>
            <dd>
            <?php 
			for($i=0;$i<count($exp1);$i++)
			{
			echo "<article>";
			echo "<h2> $exp5[$i] </h2>";
			echo "<h4> $exp[$i] </h4>";
			echo "<p class='subDetails'> $exp1[$i] to $exp3[$i] </p><br>";
			echo "</article>";
			}
			?>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Additional Details</dt>
            <dd>
            <p><?php echo $text; ?> </p>
            </dd>
            
            <dd class="clear"></dd>
            
            
            
            <dd class="clear"></dd>
        </dl>
        
        <div class="clear"></div>
    
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