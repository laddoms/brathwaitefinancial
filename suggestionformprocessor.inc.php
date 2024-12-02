<?php
		require('PHPMailer.php');
		require('Exception.php');
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
		if($_SERVER['REQUEST_METHOD']=='POST')
			{
				$error=1;   //declare flag var now and set it to 1 meaning an error exists
				if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) 
					&& !empty($_POST['suggestioncellphone'])&& !empty($_POST['suggestionmessage']))
					{
						//var_dump($_POST);  //remember to remark this out before uploading.
						$emailerror=1;   //declare flag var now and set it to 1 meaning an error exists
						$phoneerror=1;
						$email=$_POST['email'];
						$firstname=$_POST['firstname'];	
						$lastname=$_POST['lastname'];
						$cellphone=$_POST['suggestioncellphone'];
						$message=htmlspecialchars($_POST['suggestionmessage']);
						$select=$_POST['select'];
																					
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
								header("Location:contact.inc.php?content=notvalidemailaddress");   
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
						//echo"<br >the formatted cell phone number is now $formattedcellphone";	

							if (strlen($formattedcellphone)!=12)
								{
									$phoneerror=1;
									header("Location:contact.inc.php?content=phoneerror&phone=$cellphone");
								}
							else
								{
									$phoneerror=0;
									$emailmessage="NAME: $firstname $lastname\n\n Cell Phone: $formattedcellphone\n\n Message: $message\n\n  Suggestion Submitted \n\nFrom: $validatedemail";
									//echo"<br />$emailmessage";	//THIS IS ONLY FOR FORM TESTING
								}
						
												//echo"<br />";  THESE ARE ONLY FOR FORM TESTING!!
												//var_dump($_POST);
												//echo"<br />the  phone error var is $phoneerror";
												//echo"<br />the email error var is $emailerror";
												//echo"<br />the email address stored is $validatedemail";
				
				if(($emailerror===0)  && ($phoneerror===0))///if no errors from above exist send the email to Evan
							{
								//echo"<br /><p style='color:green;'>There are no errors line 82</p>";  //THIS IS ONLY FOR FORM TESTING
								$email = new PHPMailer();  ///instantiate a new instance of the phpmailer class
								$email->From      = $validatedemail;   //this has to be in the form of an email address. Add a php email filter to validation.
								$email->FromName  = $firstname . $lastname;   ///the from line is a submission from the footer form
								$email->Subject   = 'Client suggestion from brathwaitefinancial.com';   ///subject of the email
								$email->Body      = $emailmessage;           //this is ok as a variable
								$email->AddAddress( 'e.brathwaite.gfi@gmail.com' ); 
								$email->AddCC( 'j.brathwaite.gfi@gmail.com' );  //this is the 'to' address. switch this to evans address after you test this form
								//$email->AddAddress( 'addoms@comcast.net' );
								echo"<br />the message is $emailmessage";
								if($email->Send())   ////sends the email
									{
										echo"<script type=\"text/javascript\">alert(\"Your message was sent to Brathwaite Financial.\")</script>";
										$_POST=array();
										header("Location:contact.inc.php?content=success");
									}
								else
									{
										header("Location:contact.inc.php?content=didnotsend");
									}
							}
					
				}
							
								
							
			}
			
			
		
					
			
	?>	