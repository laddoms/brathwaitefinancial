<?php

 $nr="4809645000";
$nr=substr($nr, 0, 3);  //$nr is the input string. '0' is the offset. 3 is the length. 
echo"the number is now $nr ";  //480. It started at 0 and took off 3 digits. 

echo"<br /><br />";
$nr=substr($nr, 3, 3);  //
echo "now the number is $nr <br />";

$nr=substr($nr, 6, 4);



echo"<br /><br />";

$nr="4809645000";
echo substr($nr, 0, 3).'-'.substr($nr, 3, 3).'-'.substr($nr, 6, 4);

?>

<form method="POST" name="phone" action="phonetest.php">
 <label for="phone">Enter your phone number in this format 000-000-0000:</label>
<input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="xxx-xxx-xxxx"> 
<input type="submit" name="submit" value="Submit" id="submitbutton" >
			<input type="hidden" name="contact" value="contactus">  
</form>


<?php


if($_SERVER['REQUEST_METHOD']=='POST')
			{
				if(!empty($_POST['phone']))
				{
					$phone=$_POST['phone'];
					echo"the phone number entered is $phone .";
				}
			}
		
		
		

///$rest = substr("abcdef", -1);  
//echo"<br /> $rest";  // returns "f"

//$rest = substr("abcdef", -2);   
//echo"<br /> $rest";  //re

//$rest = substr("abcdef", -3, 1);
//echo "<br /> $rest"; // returns "ef"
?>