<?php

/*$phone='000-000-0000';
$valid_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
echo   $valid_number . "<br />";


function validating($phone){
$valid_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
echo $valid_number;
}
validating("()78-888?*^%$#@^!0000");

$phone='000-000-0000';

$charstosearch = array('+', '-');

$phone='000-000+0000';

$valid_number=str_replace($charstosearch, '', $phone);


echo "<br />the phone number stripped of excess characters is ". $valid_number;*/


if(isset($_GET['content']) && ($_GET['content']=='notvalidemailaddress'))
				{
					echo"<script type=text/javascript>alert(\"Please enter a valid email address.\")</script>"; 
					echo'<p style="color:red;"> please enter a valid email address';
				}
if(isset($_GET['content']) && ($_GET['content']=="error"))
						{
							$phone=$_GET['phone'];
							echo"<script type=text/javascript>alert(\"Please try resending. The phone number entered was $phone \")</script>";
							echo'<p style="color:red; font-weight:bold;"> please enter a valid phone number';
						}
?>

<div id="suggestions">
			
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" name="suggestionsform" id="suggestionsform" )">
				
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
						 <p>Cell Phone*</p>
						<p>
						
						
						<input type="text" name="suggestioncellphone" size="25" id="suggestioncellphone" placeholder="Enter your cellphone number" required>
						</p>
					
						<p>Message*</p>
						<p>
							<textarea rows="5" cols="27" name="suggestionmessage" id="suggestionmessage" placeholder="Enter your message" style="font-weight:bold"; required ></textarea>
						</p>	
					
						<input type="submit" name="suggestionformbutton" value="Submit" id="suggestionformbutton" style="font-weight:bold";>
					    <input type="hidden" name="suggestionsuggestion" value="contactus"> 
					</div>
				</form>

<?php
 
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
						$message=$_POST['suggestionmessage'];
					//	$select=$_POST['select'];
																					
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
								 //header("Location:phonefiltertest.php?content=notvalidemailaddress");   
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
						echo"<br >the formatted cell phone number is now $formattedcellphone";	

							if (strlen($formattedcellphone)!=12)
								{
									$phoneerror=1;
									echo"<br/>Please enter a ten digit cell phone number";
								}
							else
								{
									$phoneerror=0;
									$emailmessage="NAME: $firstname $lastname\n\n Cell Phone: $formattedcellphone\n\n Message: $message\n\n  Suggestion Submitted \n\nFrom: $validatedemail";
									echo"<br />$emailmessage";	
								}
						
						}
			
				echo"<br />";
				//var_dump($_POST);
				echo"<br />the  phone error var is $phoneerror";
				echo"<br />the email error var is $emailerror";
				echo"<br />the email address stored is $validatedemail";
				
				if(($emailerror===0)  && ($phoneerror===0))///if no errors from above exist send the email to Evan
							{
								echo"<br /><p style='color:red;'>There are no errors line 144</p>";
							}
				else
					{
						echo"<br /><p style='color:blue;'>There are errors line 150";
						echo"<br />the phone error is $phoneerror. The email error is $emailerror";
					}
			}
							
					
					
/*	if($_SERVER['REQUEST_METHOD']=='POST')
			{				
						$error=1;   //declare flag var now and set it to 1 meaning an error exists
						$email=$_POST['email'];
						$firstname=$_POST['firstname'];	
						$lastname=$_POST['lastname'];
						$cellphone=$_POST['suggestioncellphone'];
						$message=$_POST['suggestionmessage'];
						$cellphone=$_POST['suggestioncellphone'];
				function formatacellphonenumber($cellphone)    ///this is the needed code in my form processors. This function takes in a phone number with all sorts of chars. Strips the chars except for 0-9 and returns it
						{
					 		$charstosearch = array('+', '-');
							$cellphone = filter_var($cellphone, FILTER_SANITIZE_NUMBER_INT);  //FILTER_SANITIZE_NUMBER_INT strips all chars except for 0-9 and the minus sign and the plus sign
							$cellphone = str_replace($charstosearch, '', $cellphone);  //this func takes the $phoneinteger from above and strips the minus signs and plus signs out
							if (strlen($cellphone)!=10)
								{
									echo"<br />please enter a phone number with exactly 10 digits only. The number you entered . $cellphone";
								}
							else
								{
									$cellphone = substr_replace($cellphone, '-', 3, 0);  //insert a minus sign in place 4
									$formattedcellphone = substr_replace($cellphone, '-', 7, 0);   //insert another minus sign in place 7
									echo "<br /> original phone number was the var called cellphone and is $cellphone";
									echo"<br /> now the formatted number is the var called cellphone and is $formattedcellphone";
									return $formattedcellphone;
								}
							
						}
				$formatedcellphone = formatacellphonenumber($cellphone);
				echo"<br />";
				var_dump($_POST);
				echo"<br /> the formatted cellphone is now $formatedcellphone";
				
			}
	
	function add1($x) 
		{
			$sum=$x+1;
			return $sum;
		}

$sum = add1(5);
echo"<br />5 + 1 = $sum";


		
	/*	$phonenumber='1234567890';
		echo"<br />The original phonenumber is $phonenumber";
		$phonenumber=substr_replace($phonenumber, '-', 3, 0);
		echo "<br/>The phonenumber with one - is now $phonenumber";
		$phonenumber=substr_replace($phonenumber, '-', 7, 0);
		echo"<br />Now the phonenumber is $phonenumber";*/
		
		
//validatedphonenumber($cellphone);

//validatedphonenumber('08&+0-456%123490734!@#$');

//echo "<br /> the length of the phone number is " . strlen('0000000000');


?>