<?php
		require('PHPMailer.php');
		require('Exception.php');
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
		if($_SERVER['REQUEST_METHOD']=='POST')
			{
				var_dump($_POST);
				if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['readersemail']) 
					&& !empty($_POST['zipcode'])&& !empty($_POST['cellphone']))
					{
						$error=1;   //declare flag var now and set it to 1 meaning an error exists
						$readersemail=$_POST['readersemail'];
						$firstname=$_POST['firstname'];	
						$lastname=$_POST['lastname'];
						$cellphone=$_POST['cellphone'];
						$zipcode=$_POST['zipcode'];
						if(filter_has_var(INPUT_POST, 'termlife'))
							{
								$termlife=' The client is interested in Term Life Insurance. ';
							}
						else
							{
								$termlife=' The client did not select the Term Life Insurance icon. ';
							}
						if(filter_has_var(INPUT_POST, 'wholelife'))
							{
								$wholelife=' The client is interested in Whole Life Insurance. ';
							}
						else
							{
								$wholelife=' The client did not select the Whole Life Insurance icon. ';
							}
						if(filter_has_var(INPUT_POST, 'question'))
							{
								$question=' The client is not sure which product they are interested in. ';
							}
						else
							{
								$question=' The client did not select the insurance questions icon. ';
							}
						if(filter_has_var(INPUT_POST, 'finalexpense'))
							{
								$finalexpense=' The client is interested in final expense planning. ';
							}
						else
							{
								$finalexpense=' The client is did not select the final expense planning option. ';
							}
					
						$emailmessage="NAME: $firstname $lastname\n\n Cell Phone: $cellphone\n\n Zipcode: $zipcode\n\n $termlife\n\n $wholelife\n\n 
						$question\n\n $finalexpense\n\n Message: Contact Request \n\nFrom: $readersemail";
						
						if(filter_var($readersemail, FILTER_VALIDATE_EMAIL)) 
							{
								$validatedreadersemail = $_POST['readersemail'];  ///store the readers email address is a var called validatedreadersemail
								$error=0;   ////flag as no error
							}
						else
							{
								echo"<script type=text/javascript>alert(\"enter a valid email address.\")</script>"; 
								$error=1;   ///flag as error;
								$validatedreadersemail='';
							}
						
						if($error===0)  ///if no errors from above exist send the email to Laurie
							{
								$email = new PHPMailer();  ///instantiate a new instance of the phpmailer class
								$email->From      = $validatedreadersemail;   //this has to be in the form of an email address. Add a php email filter to validation.
								$email->FromName  = $firstname . $lastname;   ///the from line is a submission from the footer form
								$email->Subject   = 'Client inquiry from brathwaitefinancial.com';   ///subject of the email
								$email->Body      = $emailmessage;           //this is ok as a variable
								$email->AddAddress( 'e.brathwaite.gfi@gmail.com' ); 
								$email->AddCC( 'j.brathwaite.gfi@gmail.com' );  //this is the 'to' address. switch this to evans address after you test this form
								if($email->Send())   ////sends the email
									{
										echo"<script type=\"text/javascript\">alert(\"Your message was sent to Brathwaite Financial.\")</script>";
										$_POST=array();
										
										header("Location:index.php?content=success");
									}
								else
									{
										header("Location:index.php?content=goodemailaddressdidnotsend ");
									   //var dump works here if the header is removed
									}
							 }
					}
						// else	
							 {
								     //echo '<script type="text/javascript"> window.location.href = ".php"; </script>'; 
								 //header("Location:index.php?content=please fill out the form. $error");  
								 //var dump works here if header above is removed. Shows an empty array.
							 }
					
				}	
			//else
			//	{
					//header("Location:index.php?content=formnotfilledout"); 
					// I dont think this is needed
			//	}
			
			
		
					
			
	?>	