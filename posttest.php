<!--form method="POST" action="<!--?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  <input type="submit">
</form-->

<!--?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		if(isset($_POST['fname']))
			{
				$name = htmlspecialchars($_POST['fname']);
				if (empty($name)) 
					{
						echo "Name is empty";
					} 
				else 
					{
						echo $name;
					}
			}
	}

?-->


<form method="post"  action="posttest.php" name="footerForm" id="footerForm" onsubmit="return validateSubmitReaders()">
			<div id="footerright">
				<div id="formleft">
					<p>First Name* </p>
					<p>
						<input type="text" size="30" name="firstname" id="firstname"  value="<?php if(isset($_POST['firstname'])) 
																											{
																												echo$_POST['firstname'];
																											}?>" placeholder="enter your first name">
					</p>
					<p>Email Address*</p>
					<p>
						<input type="text" name="readersemail" size="30" id="readersemail" value="<?php if(isset($_POST['readersemail'])) 
																											{
																												echo$_POST['readersemail'];
																											}?>" placeholder="Enter your email address">
					</p>
				</div>																						
																									
<input type="submit" name="submit" value="Submit a Request               →" id="submitbutton" >
			<input type="hidden" name="contact" value="contactus">  

</form>
<?php
if(!empty($_POST['firstname']) && !empty($_POST['readersemail']))
{
	print_r($_POST); 
	//header("Location:index.php");
}


?>

<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/jsfunctions.js"></script> 