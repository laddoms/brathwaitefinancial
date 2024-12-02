<link href="styling.css" type="text/css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
		<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    	<link href="slickstyle.css" type="text/css" rel="stylesheet" >

<?php include('header.inc.php'); 
	  include("nav.inc.php"); ?>
<div id="jobs">
	<img src="images/financejobs.jpg" id="financejobsimage"/>
	<h1 id="overlay">Join the team</h1>
	<h2 id="overlay2">We’re looking for people to help us build products that level the financial playing field</h2>
	<h1 id="benefits1">Benefits and perks</h1>
	<h2 id="benefits">Aside from offering a competitive benefits package, we're also committed to fostering an inclusive environment for personal growth, 
		creating challenges for career development, and providing opportunities for fun along the way.
	</h2>
</div>
	<div id="columns">
		<ul>
			<li>
				<img src="images/payicon.png">
				<h3>Competitive pay</h3>
				<p>Regardless of where you choose to live, your time and effort is of equal value to us. We do not differentiate pay based on employee work location.
				</p>
			</li><br />
		
			<li>
				<img src="images/timeoff.png"/>
				<h3>Flexible paid time off</h3>
				<p>Team members get Juneteenth and winter break off, too</p>
			</li><br />
			<li>
				<img src="images/growth.png">
				<h3>401(k) with company match</h3>
				<p>Your financial future starts now. Save for retirement with a 401(k) savings plan and competitive company match</p>
			</li><br />
			<li>
				<img src="images/advice.png">
				<h3>Free financial advising</h3>
				<p>We walk the walk. Leveling the financial playing field includes giving our team the financial wellness support they need</p>
			</li><br />
			<li>
				<img src="images/caregiver.png">
				<h3>Generous parental and caregiver leave</h3>
				<p>We offer inclusive leave options for you and your family–whether that’s time off to support your little one or another family member</p>
			</li><br />
			<li>
				<img src="images/health.png">
				<h3>Comprehensive coverage</h3>
				<p>You’ve got premium options when it comes to your health, dental, vision, disability, and life insurance packages and plans</p>
			</li>
		</ul>
	</div>
	<div id="work">
		<h1>Work From Anywhere</h1>
		<p>GFI is a fully virtual company. Work from anywhere in the U.S.  We bring the company together 1–2 times per year plus team offsites</p>
	</div>
	<div id="meet">
		<h1>Meet the leadership team</h1>
		<h2>The leaders at GFI help guide us with the values that define our culture</h2>
		<img src="images/leadershipman.jpg"/>
	</div>
	<div id="charles">
		<h3>Charles Meeks</h3>
		<p>Charles inspires and motivates others to work towards a vision.
		   He has a clear vision and are able to communicate it to others. 
			Aim and sustain focus. Develop greater clarity Listen and communicate more effectively Mindfully Communicate Respond instead of react under pressure
			Foster creativity and innovation. Structure more effective team dynamics. Lead Mindful Meetings. Cultivate productive and healthy use of technology
		</p>
	</div>



	</div>









<?php include("footer.inc.php");?>

<script src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script>
	$(function(){
	  $('a').each(function() {
		if ($(this).prop('href') == window.location.href) {
		  $(this).addClass('current');
		}
	  });
	});
</script>