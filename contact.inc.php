
<?php include('header.inc.php'); 
	  include("nav.inc.php"); ?>
<div id="wrapper">
	<img src="images/womanonphone.jpg" id="womanphone"/>
	<h1 id="contactH1">Got Questions? We Got Answers</h1>
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
</div>
		<div class="contact">
			<h1>LETS TALK ABOUT YOUR FINANCIAL NEEDS</H1>
			<hr >
			<div id="contactemaildiv">
				<h2>SEND AN EMAIL</H2><br /><br />
				<img src="images/handsonphoneblackman.jpg" alt="photo of Justin and Evan">
				<p>Have questions, comments, or suggestions?</p>
				<p>Contact Justin or Evan by email at</p>
				<p><a href="mailto:e.brathwaite.gfi@gmail.com"></p>
				<p>e.brathwaite.gfi@gmail.com</p></a>
				<p><a href="mailto:j.brathwaite.gfi@gmail.com"></p>
				<p>Or Justin at j.Brathwaite.gfi@gmail.com</p></a>
			</div>	
		
			<div id="contactformdiv">
				<h2>SUBMIT A FORM</H2><br /><br />
				
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" name="contactform" id="contactform" onsubmit="return validateSubmitContact()">
					First Name*					
					<p><input type="text" size="22" name="firstname" id="contactfirstname"  placeholder="Enter your first name" required>
					</p>
					<p>Last Name*</p>
					<p>
					<input type="text" size="22" name="lastname" id="contactlastname" placeholder="Enter your last name" required>
					</p>
					<p>Email Address*</p>
					<p>
					<input type="text" name="email" size="25" id="contactemail" placeholder="Enter your email address" required>
					</p>
					 <p>Cell Phone  <small>10 digits only*</small></p>
					<p>
					<input type="text" name="cellphone" size="25" id="contactcellphone" placeholder="Enter your cellphone number" required maxlength="10" minlength="10">
					</p>
					<p>Message*</p>
					<p>
						<textarea rows="5" cols="27" name="message" id="contactmessage" placeholder="Enter your message" style="font-weight:bold"; required></textarea>
					</p>	
						<input type="submit" name="submit" value="Contact Us" id="contactformbutton" style="font-weight:bold";>
					    <input type="hidden" name="contactcontact" value="contactus"> 
				</form>
			</div>
			<div id="contactcall">
				<H2>CALL US</H2><br /><br />
				<img src="images/manonphone.jpg" alt="image of a man on a cell phone">
				<h2>Lets Talk</h2>
				<h3>Speak to Evan or Justin Brathwaite</h3>
				<p>Phone: ‪(347) 414-7292‬ </p>
				
			</div>
		</div>
			
			<div id="suggestions">
				<h1>WE CANT WAIT TO HEAR YOUR IDEAS OR SUGGESTIONS</H1>
				<hr />
				<img src="images/ideas.jpg"/>


				<form method="post" action="suggestionformprocessor.inc.php" name="suggestionsform" id="suggestionsform" onsubmit="return validateSuggestion()">
				
					<div id="suggestionformleft">
						<p>First Name*		</p>			
							<p><input type="text" size="22" name="firstname" id="suggestionfirstname"  placeholder="Enter your first name" required>
						</p>
						<p>Last Name*</p>
						<p>
							<input type="text" size="22" name="lastname" id="suggestionlastname" placeholder="Enter your last name" required>
						</p>
						<p>Email Address*</p>
						<p>
							<input type="text" name="email" size="25" id="suggestionemail" placeholder="Enter your email address"required>
						</p>
					</div>
					<div id="suggestionformright">
						<p>Cell Phone*<small>Ten digits only</small></p>
						<p>	
							<input type="text" name="suggestioncellphone" size="25" id="suggestioncellphone" placeholder="Enter your cellphone number"maxlength="10" minlength="10" required>
						</p>
							<p>Select One*</p>
						<select name="select" id="suggestionselect">
							<option value="insurance">Insurance</option>
							<option value="website">Website Issues</option>
							<option value="financialplanning">Financial Planning</option>
							<option value="suggestion">Suggestion</option>
							<option value="other">Other</option>
						</select>
							<p>Message*</p>
						<p>
							<textarea rows="5" cols="27" name="suggestionmessage" id="suggestionmessage" placeholder="Enter your message" style="font-weight:bold"; required ></textarea>
						</p>	
					
						<input type="submit" name="suggestionformbutton" value="Submit" id="suggestionformbutton" style="font-weight:bold";>
					    <input type="hidden" name="suggestionsuggestion" value="contactus"> 
					</div>
				</form>
			</div>
					
			<script src="js/jsfunctions.js"></script> 
			<script src="js/jquery-1.11.2.min.js"></script>
			<script src="js/jsfunctions.js"></script> 
<?php include('footer.inc.php'); 
			
			//require('PHPMailer.php');
			//require('Exception.php');
			use PHPMailer\PHPMailer\PHPMailer;
			use PHPMailer\PHPMailer\Exception;
			if($_SERVER['REQUEST_METHOD']=='POST')
				{
					if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['message'])
						&& !empty($_POST['cellphone']))
						{
							$emailerror=1;   //declare flag var now and set it to 1 meaning an error exists
							$phoneerror=1;
							$email=$_POST['email'];
							$firstname=$_POST['firstname'];	
							$lastname=$_POST['lastname'];
							$cellphone=$_POST['cellphone'];
							$message=$_POST['message'];
						
							$message=htmlspecialchars($message);
							if(filter_var($email, FILTER_VALIDATE_EMAIL)) 
								{
									?><div id="validatedemail" style="display: none;">  <!--YOU CAN GET RID OF THIS WHEN YOU GET RID OF THE JS VALIDATION-->
								   <?php
									  $validatedemail=$_POST['email'];  /////THIS IS ONLY SO THE javascript VALIDATION WORKS.
									  echo htmlspecialchars($validatedemail);  ///if I store the php var in a text element then I can access it via javascript
								   ?></div><?php
								
									$validatedemail = $_POST['email'];  ///store the readers email address is a var called validatedreadersemail
									$emailerror=0;   ////flag as no error
								}
							else
								{
									echo"<script type=text/javascript>alert(\"enter a valid email address.\")</script>"; 
									$emailerror=1;   ///flag as error;
									$validatedemail='';
									if(!headers_sent())
										{
											header("Location:contact.inc.php?content=notvalidemailaddress");   
										}
								}
									
							function formatacellphonenumber($cellphone)    ///this is the needed code in my form processors. This function takes in a phone number with all sorts of chars. Strips the chars except for 0-9 and returns it
								{
									$charstosearch = array('+', '-');
									$cellphone = filter_var($cellphone, FILTER_SANITIZE_NUMBER_INT);  //FILTER_SANITIZE_NUMBER_INT strips all chars except for 0-9 and the minus sign and the plus sign
									$cellphone = str_replace($charstosearch, '', $cellphone);  //this func takes the var from above and strips the minus signs and plus signs out
									if (strlen($cellphone)!=10)
										{
											$formattedcellphone=1;
											return $formattedcellphone;  //this actually returns the number 1. So now the formattedcellphone is set to 1. 
										}
									else
										{
											$phoneerror=0;
											$cellphone = substr_replace($cellphone, '-', 3, 0);  //insert a minus sign in place 4
											$formattedcellphone = substr_replace($cellphone, '-', 7, 0);   //insert another minus sign in place 7
											return $formattedcellphone;
										}
									
								}
								
							$formattedcellphone = formatacellphonenumber($cellphone);  //this sets the var called formattedcellphone to whatever the function returns. 
							
						if (strlen($formattedcellphone)!=12)
								{
									$phoneerror=1;
									echo"<script type=text/javascript>alert(\"Please try resending. The phone number entered was $cellphone \")</script>";
									//header("Location:contact.inc.php?content=phoneerror&phone=$cellphone");
								}
							else
								{
									$phoneerror=0;
									$emailmessage="NAME: $firstname $lastname\n\n Cell Phone: $formattedcellphone\n\n Message: $message\n\n  Suggestion Submitted \n\nFrom: $validatedemail";
									//echo"<br />$emailmessage";	//THIS IS ONLY FOR FORM TESTING
								}
						
								
							
							if(($emailerror===0)  && ($phoneerror===0))///if no errors from above exist send the email to Evan
								{
									//echo"<br /><p style='color:green;'>There are no errors line 82</p>";  //THIS IS ONLY FOR FORM TESTING
									$email = new PHPMailer();  ///instantiate a new instance of the phpmailer class
									$email->From      = $validatedemail;   //this has to be in the form of an email address. Add a php email filter to validation.
									$email->FromName  = $firstname . $lastname;   ///the from line is a submission from the footer form
									$email->Subject   = 'Client suggestion from brathwaitefinancial.com';   ///subject of the email
									$email->Body      = $emailmessage;           //this is ok as a variable
									//$email->AddAddress( 'e.brathwaite.gfi@gmail.com' ); 
									//$email->AddCC( 'j.brathwaite.gfi@gmail.com' );  //this is the 'to' address. switch this to evans address after you test this form
									$email->AddAddress( 'addoms@comcast.net' );
														
									if($email->Send())   ////sends the email
											{
												echo"<script type=\"text/javascript\">alert(\"Your message was sent to Brathwaite Financial.\")</script>";
												$_POST=array();
												header("Location:contact.inc.php?content=success");
											}
										else
											{
												if(!headers_sent())
												{
													header("Location:contact.inc.php?content=didnotsend");
												}
											}
								}
													
						}
				}
				
							
					
				?>	
	


<script src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script>
	$(function(){
	  $('a').each(function() {
		if ($(this).prop('href') == window.location.href) {
		  $(this).addClass('current');
		}
	  });
	});
</script>