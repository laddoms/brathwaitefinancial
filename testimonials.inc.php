<link href="styling.css" type="text/css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
		<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    	<link href="slickstyle.css" type="text/css" rel="stylesheet" >
		
<div id="testtop" >
<?php   include('header.inc.php'); 
		include("nav.inc.php");?>
</div>  
<?php if(isset($_GET['content']) && ($_GET['content']=='notvalidemailaddress'))
						{
							echo"<script type=text/javascript>alert(\"Please enter a valid email address.\")</script>"; 
							echo'<p style="color:red; font-weight:bold;"> please enter a valid email address';
						}
					if(isset($_GET['content']) && ($_GET['content']=="phoneerror"))
						{
							$phone=$_GET['phone'];
							echo"<script type=text/javascript>alert(\"Please try resending. The phone number entered was $phone \")</script>";
							echo'<p style="color:red; font-weight:bold;"> please enter a valid phone number';
						}
					if(isset($_GET['content']) && ($_GET['content']=='success'))
						{
							echo"<script type=text/javascript>alert(\"Thank you for contacting Brathwaite Financial.\")</script>"; 
						}
					if(isset($_GET['content']) && ($_GET['content']=='didnotsend'))
						{
							echo"<script type=text/javascript>alert(\"Please try resending. \")</script>"; 
						}
	?>
	<div id="hear">
		<h1>Hear what Brathwaite Financial customers have to say</h1>
	</div>
	
	</div>
		
		<div id="testimonialpeople">
			<ul>
				<li id="firstli">
					<img src="images/happycustomer2.jpg "/>
					<h2> Angela</h2><h3>Unique Seattle</h3>
					<p>The Brathwaite brothers set up insurance and savings accounts for me and my family so that we can relax and know that
						our future is taken care of. We also set up life insurance plans for the employees of our small, family owned coffee shop. 
					</p>
				</li>
				<li>
					<img src="images/happycouple.jpg" />
					<h2>Christine and Brad</h2><h3>Ford Enterprises NYC</h3>
					<p>We were so pleased with both Justin and Evan. They went beyond the call of duty and carefully listened to our needs and concerns.
						We felt like both cared about our situation and we can rest assured knowing our small, but growing family will be taken care of.
					</p>
				</li>
				<li>
					<img src="images/happycustomer.jpg" />
					<h2>Kerry</h2><h3>Chewy Dot Com</h3>
					<p>I worked with Evan for a week choosing life insurance. I shared my concerns with him. I have a daughter I need to provide for. Evan
					   was able to find me an affordable policy that meets my needs. He took my concerns seriously and was very attentive to my needs.
					</p>
				</li>
			</ul>
		</div>
		<div id="testimonialform">
			<form method="post"  action="testimonials.inc.php" name="testform" id="testform" onsubmit="return validateTestForm()" >
				<fieldset>
					<legend><h3>WOULD YOU LIKE TO SUBMIT YOUR OWN TESTIMONIAL?</h3></legend>	
						<div id="testformleft">
							<p>First Name*</p>
							<p>
								<input type="text" autofocus size="50" name="firstname" id="testfirstname" required placeholder="Enter Your First Name" value="<?php if(isset($_POST['firstname']))echo $_POST['firstname'];?>">
							</p>         
							<p>Last Name*</p>
							<p>
								<input type="text" size="50" name="lastname" id="testlastname" required placeholder="Enter Your Last Name" value="<?php if(isset($_POST['lastname']))echo $_POST['lastname'];?>"/>
							</p>
							<p><input type="submit" name="testimonialsubmit" id="testimonialsubmit" value="Submit" ></p>
							<input type="hidden" name="testimonial" value="Submit">  
						</div>
						<div id="testformright">
							<p>Email*</p>
								<input type="text" size="50" name="email" id="testemail" required placeholder="Enter Your Email Address" value="<?php if(isset($_POST['email']))echo $_POST['email'];?>">
							</p>	
							<p>Your testimonial*</p>
								<p><textarea rows="7" cols="50" name="testimonial" required id="testimonialmessage"placeholder="Enter your testimonial here" value="<?php if(isset($_POST['testimonial']))echo $_POST['testimonial'];?>"></textarea>
							</p>
							
						</div>
				</fieldset>
			</form>
		</div>

<?php include('footer.inc.php');?>

<script src="js/jquery-1.11.2.min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	 
<?php
			//require('PHPMailer.php');
			//require('Exception.php');
			use PHPMailer\PHPMailer\PHPMailer;
			use PHPMailer\PHPMailer\Exception;
			if($_SERVER['REQUEST_METHOD'] == 'POST') 
				{
						$firstname=$_POST['firstname'];
						$lastname=$_POST['lastname'];
						$email=$_POST['email'];
						$testimonial=$_POST['testimonial'];
						$emailerror=1;   //declare flag var now and set it to 1 meaning an error exists
						$testimonialmessage=htmlspecialchars($testimonial);
							if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
								{
									 $validatedemail=$_POST['email'];  /////THIS IS ONLY SO THE javascript VALIDATION WORKS.
									 $emailerror=0;   ////flag as no error
								}
							else
								{
									echo"<script type=text/javascript>alert(\"enter a valid email address.\")</script>"; 
									$emailerror=1;   ///flag as error;
									$validatedemail='';
									if(!headers_sent())
										{
											//echo"<script type=\"text/javascript\">alert(\"headers sent\")</script>";
											header("Location:testimonials.inc.php?content=notvalidemailaddress");   
										}
								}
							
							if($emailerror===0)///if no errors from above exist send the email to Evan
								{
									//echo"<br /><p style='color:green;'>There are no errors line 82</p>";  //THIS IS ONLY FOR FORM TESTING
									$message="From: $firstname $lastname\n\n  Message: $testimonialmessage \n\nFrom: $validatedemail";
									$email = new PHPMailer();  ///instantiate a new instance of the phpmailer class
									$email->From      = $validatedemail;   //this has to be in the form of an email address. Add a php email filter to validation.
									$email->FromName  = $firstname . $lastname;   ///the from line is a submission from the footer form
									$email->Subject   = 'Client testimonial from brathwaitefinancial.com';   ///subject of the email
									$email->Body      = $message;           //this is ok as a variable
									$email->AddAddress( 'e.brathwaite.gfi@gmail.com' ); 
									$email->AddCC( 'j.brathwaite.gfi@gmail.com' );  //this is the 'to' address. switch this to evans address after you test this form
									//$email->AddAddress( 'addoms@comcast.net' );
														
									if($email->Send())   ////sends the email
											{
												echo"<script type=\"text/javascript\">alert(\"Your message was sent to Brathwaite Financial.\")</script>";
												$_POST=array();
												header("Location:testimonial.inc.php?content=success");
											}
										else
											{	
												echo"<script type=text/javascript>alert(\"please try resending.\")</script>"; 
												//var_dump($_POST);	
												if(!headers_sent())
													{
														header("Location:testimonial.inc.php?content=didnotsend");
													}
											}
								}
													
						}		
							
								

									
								
							
						
							
				