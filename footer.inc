<footer>
	<H1 id="footerh1"><i>Schedule a Call With Us</h1></i>
	<div id="footerleft">
		<br /><br />
		<h2>Evan Brathwaite Jr</h2>
	    <h2>and Justin Brathwaite</h2>
		<h3>Brathwaite Financial</h3>
		<p id="questions">If you have questions about your life insurance needs or want more information 
						  before you begin the application, lets talk. 
		</p>
		<br />
		<p><a href="mailto:e.brathwaite.gfi@gmail.com">
		
		<p class="footeremail"><B>Contact Brathwaite Financial via Email at </p>
		
		<p class="footeremail" ><img src="images/mailicon.png">e.brathwaite.gfi@gmail.com</a></p></B>
		<p id="footerphone"><img src="images/phoneicon.png">  Phone: ‪(347) 414-7292‬  </p>
		
	</div>
	
	<form method="post"  action="footer.inc.php" name="footerForm" id="footerForm" onsubmit="return validateSubmitReaders()">
			<div id="footerright">
				<div id="formleft">
					<p>First Name* </p>
					<p>
						<input type="text" size="30" name="firstname" id="firstname" placeholder="Add your first name">
					</p>
					<p>Email Address*</p>
					<p>
						<input type="text" name="readersemail" size="30" id="readersemail" placeholder="Enter your email address">
					</p>
				</div>
				<div id="formright">
					<p>Last Name*</p>
					<p>
						<input type="text" size="30" name="lastname" id="lastname" placeholder="Add your last name">
					</p>
					<p><p>Cell Phone* <small>Format xxx-xxx-xxxx</small></p></p>
					<p>
						<input type="tel" id="cellphone" size="30" name="cellphone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="xxx-xxx-xxxx"> 
						<!--input type="text" name="cellphone" size="30" id="cellphone" placeholder="Enter your cell phone number"-->
					</p>
					<p>Zip Code*</p>
					<p>
						<input type="text" name="zipcode" size="30" id="zipcode" placeholder="Enter your zip code">
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
					<li>
				</ul>
			</div>
						
			<input type="submit" name="submit" value="Submit a Request               →" id="submitbutton" >
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
					
						$emailmessage="NAME: $firstname $lastname\n\n Cell Phone: $cellphone\n\n. Zipcode: $zipcode\n\n $termlife\n\n. $wholelife\n\n. 
						$question\n\n. $finalexpense\n\n Message: Contact Request \n\nFrom: $readersemail";
						
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
								$email->AddAddress( 'evan72581@gmail.com' );  //this is the 'to' address. switch this to evans address after you test this form
								if($email->Send())   ////sends the email
									{
										echo"<script type=\"text/javascript\">alert(\"Your message was sent to Brathwaite Financial.\")</script>";
										$_POST=array();
										var_dump($_POST);
										header("Location:index.php?content=success");
									}
								else
									{
										header("Location:index.php?content=goodemailaddressdidnotsend error code is : $error");
									
									}
							 }
						 else	
							 {
								 header("Location:index.php?content=$error");  
							 }
					}
			else
				{
					header("Location:index.php?content=formnotfilledout"); 

				}	
			
			}
					
			
	?>	
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/jsfunctions.js"></script> 
</footer>