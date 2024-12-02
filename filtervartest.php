
<form method="post" action="filtervartest.php">
    <input type="text" name="email" placeholder="enter your email">
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
		<input type="checkbox" id="finalexpense" name="finalexpense" value="finalexpense"/>
		<label for="finalexpense"><img src="images/coffin.png" /></label>
		<p>Final Expense</p>
	</li>
	 <li>
		<input type="checkbox" id="questions" value="questions" name="questions"/>
		<label for="question"><img src="images/question.png" /></label>
		<p>Not Sure Yet</p>
	 </li>
    <input type="submit">
</form>

<?php

if($_SERVER['REQUEST_METHOD']=='POST')
	{
		 
			
		if(filter_has_var(INPUT_POST, 'termlife'))
			{
				echo $_POST['termlife'] . " is checked. ";
			}
		else
			{
				echo " term life not checked. ";
			}
		if(filter_has_var(INPUT_POST, 'wholelife'))
			{
				echo $_POST['wholelife'] . " is checked.";
			}
		else
			{
				echo " whole life not checked. ";
			}
		if(filter_has_var(INPUT_POST, 'finalexpense'))
			{
				echo" finalexpense is checked. ";
			}
		else
			{
				echo" finalexpense is not checked. ";
			}
		if(filter_has_var(INPUT_POST, 'questions'))
			{
				echo" the client has questions .";
			}
		else
			{
				echo" the client has no questions. ";
			}
	}
			
////works up to here



	
?>