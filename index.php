<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>	
		<html lang="en">
		<meta name="description" content="brathwaite Financial. Insurance sales. Life insurance. End of life planning. Estate planning" />
		<meta name="keywords" content="Brathwaite. Financial. Insurance. Sales. Life. Planning. Advice. Financial." />
		<meta name="author" content="Laurie Addoms, Evan BRATHWAITE, Justin Brathwaite">
		<!--meta name="google-site-verification" content="SgSoecd7wlU8s7ZpugWhIgYAJd5VMNL3RKI4zTEtUl8" /-->
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name=viewport content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=DM+Serif+Text&display=swap" rel="stylesheet"> 
		<meta http-equiv="content-type" content="text/html;charset=uts-8" />
		<title>Brathwaite Financial</title>
		<link href="styling.css" type="text/css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
		<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    	<link href="slickstyle.css" type="text/css" rel="stylesheet" >
		
    
<html>
	<link href="https://fonts.googleapis.com/css?family=Marck+Script" rel="stylesheet"> 
<body>
	
		<?php include("nav.inc.php");?>
		

	<div id="wrapper">
		<?php include('header.inc.php'); ?>	
		
		<div id="header">
			<h1 id="BrathwaiteTitle">Brathwaite Financial</h1>
			<h3 id="titleh3">Financial and Insurance Information and Sales</h3>
			<img id="evanandjustin8" src="images/brothersheadshot.png"/>	
		</div>
			
		
		<?php
			if(isset($_GET['content']) && ($_GET['content']=='success'))
				{
					echo"<script type=text/javascript>alert(\"Thank you for contacting Brathwaite Financial.\")</script>"; 
				}
			if(isset($_GET['content']) && ($_GET['content']=='didnotsend'))
				{
					echo"<script type=text/javascript>alert(\"Please try resending. \")</script>"; 
				}
			if(isset($_GET['content']) && ($_GET['content']=="formnotfilledout"))
				{
					echo"<script type=text/javascript>alert(\"Please fill out the form\")</script>"; 
				}
			
		?>
		
		
		
	</div>
	
	<?php		
	
				include("portfolio.inc.php");  //this is the "investing in your future today" part   
				include("finance.inc.php");
				include("footer.inc.php");   
	?>
	
	
</body>
<script src="js/jquery-1.11.2.min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
    
	  
	  <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script>
	var coll = document.getElementsByClassName("collapsible");
	var i;

	for (i = 0; i < coll.length; i++) {
	  coll[i].addEventListener("click", function() {
		this.classList.toggle("active");
		var content = this.nextElementSibling;
		if (content.style.maxHeight){
		  content.style.maxHeight = null;
		} else {
		  content.style.maxHeight = content.scrollHeight + "px";
		}
	  });
	}
</script>