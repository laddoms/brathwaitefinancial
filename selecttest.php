<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div>
        <label for="color">Background Color:</label>
       <p>Select One*</p>
						<select name="select" id="suggestionselect">
						  <option value="insurance">Insurance</option>
						  <option value="website">Website Issues</option>
						  <option value="financial planning">Financial Planning</option>
						  <option value="suggestion">Suggestion</option>
						  <option value="other">Other</option>
						</select>
    </div>
    <div>
        <button type="submit">Select</button>
    </div>
</form>

<?php 


if(isset($_POST['select']))
{
	$select=$_POST['select'];
	echo "<p>You selected  $select </p>";
}

								