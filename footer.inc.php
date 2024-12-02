


<footer>
	<H1 id="footerh1"><i>Schedule a Call With Us</h1></i>
	<div id="footerleft">
		<br />
		<h2>Evan Brathwaite Jr</h2>
	    <h2>and Justin Brathwaite</h2>
		<hr />
		<h2>Brathwaite Financial</h2>
		<p id="questions">If you have questions about your life insurance needs or want more information 
						  before you begin the application, lets talk. 
		</p>
		<p class="footeremail">Contact Brathwaite Financial via Email at </p>
		<p><a href="mailto:e.brathwaite.gfi@gmail.com">
		<p class="footeremail" ><img src="images/mailicon.png" id="mailicon">e.brathwaite.gfi@gmail.com</p></a>
		<p><a href="mailto:j.brathwaite.gfi@gmail.com">
		<p class="footeremail"><img src="images/mailicon.png" id="mailicon"> j.brathwaite.gfi@gmail.com</a></p>
		<p id="footerphone"><img src="images/phoneicon.png">  Phone: ‪(347) 414-7292‬  </p>
		<p>Brathwaite Financial is associated with Global Financial Impact</p>
		<p><a href="https://www.globalfinancialimpact.com">Visit GFI at www.globalfinancialimpact.com</p></a>
		
	</div>
		<?php
		if(isset($_GET['content']) && ($_GET['content']=='notvalidemailaddress'))
					{
						echo"<script type=text/javascript>alert(\"Please enter a valid email address.\")</script>"; 
						echo'<p style="color:red; font-weight:bold;"> please enter a valid email address';
					}
				if(isset($_GET['content']) && ($_GET['content']=="phoneerror"))
					{
						$phone=$_GET['phone'];
						echo"<script type=text/javascript>alert(\"Please enter a ten digit phone number. The phone number entered was $phone \")</script>";
						echo'<p style="color:red; font-weight:bold; width:100%; margin-left:auto; margin-right:auto;"> please enter a valid phone number';
					}
			?>
	<form method="post"  action="footer.inc.php" name="footerForm" id="footerForm" > <!--onsubmit="return validateSubmitReaders()"-->
			<div id="footerright">
				<div id="formleft">
					<p>First Name* </p>
					<p>
						<input type="text" size="20" name="firstname" id="firstname"   placeholder="enter your first name" Required>
					
					</p>
					<p>Email Address*</p>
					<p>
						<input type="text" name="readersemail" size="20" id="readersemail" placeholder="Enter your email address" required>
					</p>
				</div>
				<div id="formright">
					<p>Last Name*</p>
					<p>
						<input type="text" size="20" name="lastname" id="lastname" placeholder="Add your last name" required> 
					</p>
					<p>Cell Phone*<small>Ten digits only</small></p>
					<p>
						<input type="text" name="cellphone" size="30" id="cellphone" placeholder="Enter your cell phone number" maxlength="10" minlength="10"required>
					</p>
					<p>Zip Code*</p>
					<p>
						<input type="text" name="zipcode" size="20" id="zipcode" placeholder="Enter your zip code" required>
					</p>
				</div>
			
	</form>
			
			
			<div id="lifeinsuranceproducts">
			<h4 id="select">Select All That Apply:</h4>
				<ul>
				    <li>
						<input type="checkbox" id="termlife" value="termlife" name="termlife"/>
						<label for="termlife"><img src="images/umbrella.png" /></label>
						<p>Term Life</p>
					</li>
					<li>
						<input type="checkbox" id="wholelife" name="wholelife" value="wholelife" />
						<label for="wholelife"><img src="images/shield.png" /></label>
						<p>Whole Life</p>
					</li>
					 <li>
						<input type="checkbox" id="question" name="question" value="question" />
						<label for="question"><img src="images/question.png" /></label>
						<p>Questions</p>
					</li>
					 <li>
						<input type="checkbox" id="finalexpense" name="finalexpense" value="finalexpense"/>
						<label for="finalexpense"><img src="images/coffin.png" /></label>
						<p>Final Expense</p>
					</li>
					
				</ul>
			</div>
						
			<input type="submit" name="submit" value="Submit a Request            →" id="submitbutton" >
			<input type="hidden" name="contact" value="contactus">  
			<script src="js/jsfunctions.js"></script> 
		</div>
<?php
		require('PHPMailer.php');
		require('Exception.php');
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
		if($_SERVER['REQUEST_METHOD']=='POST')
			{
				//var_dump($_POST);
				if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['readersemail']) 
					&& !empty($_POST['zipcode'])&& !empty($_POST['cellphone']))
					{
						$emailerror=1;   //declare flag var now and set it to 1 meaning an error exists
						$phoneerror=1;
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
					
						
						
						if(filter_var($readersemail, FILTER_VALIDATE_EMAIL)) 
							{
								$validatedreadersemail = $_POST['readersemail'];  ///store the readers email address is a var called validatedreadersemail
								$emailerror=0;   ////flag as no error
							}
						else
							{
								echo"<script type=text/javascript>alert(\"enter a valid email address.\")</script>"; 
								$emailerror=1;   ///flag as error;
								$validatedreadersemail='';
								 header("Location:index.php?content=notvalidemailaddress");   
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
									header("Location:index.php?content=phoneerror&phone=$cellphone");
								}
							else
								{
									$phoneerror=0;
									$emailmessage="From: $firstname $lastname\n\n Cell Phone: $formattedcellphone\n\n Zipcode: $zipcode\n\n $termlife\n\n $wholelife\n\n $question\n\n $finalexpense\n\n Message: Contact Request \n\nFrom: $validatedreadersemail";
									//echo"<br />$emailmessage";	
								}
						//echo$formattedcellphone;
						if(($emailerror===0)  && ($phoneerror===0))///if no errors from above exist send the email to Evan
							{
								$email = new PHPMailer();  ///instantiate a new instance of the phpmailer class
								$email->From      = $validatedreadersemail;   //this has to be in the form of an email address. Add a php email filter to validation.
								$email->FromName  = $firstname . $lastname;   ///the from line is a submission from the footer form
								$email->Subject   = 'Client inquiry from brathwaitefinancial.com';   ///subject of the email
								$email->Body      = $emailmessage;           //this is ok as a variable
								//$email->AddAddress( 'e.brathwaite.gfi@gmail.com' ); 
								//$email->AddCC( 'j.brathwaite.gfi@gmail.com' );  //this is the 'to' address. switch this to evans address after you test this form
								$email->AddAddress('addoms@comcast.net');
								if($email->Send())   ////sends the email
									{
										echo"<script type=\"text/javascript\">alert(\"Your message was sent to Brathwaite Financial.\")</script>";
										$_POST=array();
										header("Location:index.php?content=success");
									}
								else
									{
										header("Location:index.php?content=didnotsend");
									}
							}
					
				}
							
								
							
			}
			
			
		
					
			
	?>	
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/jsfunctions.js"></script> 
</footer>
