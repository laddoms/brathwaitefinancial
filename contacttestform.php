<?php	if(isset($_GET['content']) && ($_GET['content']=='notvalidemailaddress'))
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

<div id="contactformdiv">
				<h2>SUBMIT A FORM</H2><br /><br />
				
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" name="contactform" id="contactform" ><!--onsubmit="return validateSubmitContact()"-->
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
					 <p>Cell Phone*</p>
					<p>
						<input type="text" name="cellphone" size="25" id="contactcellphone" placeholder="Enter your cellphone number" required>
					</p>
					<p>Message*</p>
					<p>
						<textarea rows="5" cols="27" name="message" id="contactmessage" placeholder="Enter your message" style="font-weight:bold"; required></textarea>
					</p>	
						<input type="submit" name="submit" value="Contact Us" id="contactformbutton" style="font-weight:bold";>
					    <input type="hidden" name="contactcontact" value="contactus"> 
				</form>
				
<?php			

			require('PHPMailer.php');
			require('Exception.php');
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
											$phoneerror=1;
											return $phoneerror;  //this actually returns the number 1. So now the formattedcellphone is set to 1. 
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
									If (!headers_sent()) //if headers are not already sent. 
												{
													header("Location:contact.inc.php?content=phoneerror&phone=$cellphone");
												}
								}
							else
								{
									$phoneerror=0;
									$emailmessage="From: $firstname $lastname\n\n Cell Phone: $formattedcellphone\n\n Message: $message\n\n  Suggestion Submitted \n\nFrom: $validatedemail";
									//echo"<br />$emailmessage";	//THIS IS ONLY FOR FORM TESTING
								}
								
							
							if(($emailerror===0)  && ($phoneerror===0))///if no errors from above exist send the email to Evan
								{
									echo"<br /><p style='color:green;'>There are no errors line 82</p>";  //THIS IS ONLY FOR FORM TESTING
									$email = new PHPMailer();  ///instantiate a new instance of the phpmailer class
									$email->From      = $validatedemail;   //this has to be in the form of an email address. Add a php email filter to validation.
									$email->FromName  = $firstname . $lastname;   ///the from line is a submission from the footer form
									$email->Subject   = 'Client suggestion from brathwaitefinancial.com';   ///subject of the email
									$email->Body      = $emailmessage;           //this is ok as a variable
									//$email->AddAddress( 'e.brathwaite.gfi@gmail.com' ); 
									//$email->AddCC( 'j.brathwaite.gfi@gmail.com' );  //this is the 'to' address. switch this to evans address after you test this form
									$email->AddAddress( 'addoms@comcast.net' );
									echo"<br />the message is $emailmessage"; //THIS IS FOR TESTING ONLY
									echo"<br />";
									var_dump($_POST);
									echo"<br />the  phone error var is $phoneerror";
									echo"<br />the email error var is $emailerror";
									echo"<br />the email address stored is $validatedemail";
									
									if(($emailerror===0)  && ($phoneerror===0))///if no errors from above exist send the email to Evan
										if($email->Send())   ////sends the email
											{
												echo"<script type=\"text/javascript\">alert(\"Your message was sent to Brathwaite Financial.\")</script>";
												$_POST=array();
												if (!headers_sent()) //if headers are not already sent. 
													{
														header("Location:contact.inc.php?content=success");
														
													}
											}
										else
											{
												
												if(!headers_sent())
													{	
														header("Location:contact.inc.php?content=didnotsend ");
													}	
											}
												//echo"<br />this is testing line 155. No errors but email didnt send";
												//echo"<br /><p style='color:blue;'>There are errors line 150";
												//echo"<br />the phone error is $phoneerror. The email error is $emailerror";	
								}
						}
				}