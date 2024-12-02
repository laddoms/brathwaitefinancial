

	<?php include("nav.inc.php"); ?>
	<?php include('header.inc.php'); ?>	

	<div id="usheader">
		<h1 >The BRATHWAITE Story</h1>
			<hr />
		<img src="images/evan and justin 3.jpg"  />
	</div>
	
	<div class="ourstory">
		<h1>Two brothers committed to their customers</h1>
		<p>Brathwaite Financial was founded by Justin and Evan Brathwaite. Our goal is educating customers about the true 
		   value of insurance. 
		</p>
	</div>	
	<div class="customersdiv">
		<h1>Customer Driven</h1>
			<p>To achieve this, we take a comprehensive approach that assesses a customer's specific needs and desires, 
				aligning them with the most appropriate insurance options available. 
			</p>
		<h1>We Bring the Information</h1>
			<p>We enhance our customer's understanding 
				of financial literacy. We also foster strong relationships with clients throughout the entire process by 
				exemplifying honesty, professionalism, and integrity at every interaction.
			</p>
	</div>
	<img src="images/happymechresized2.jpg" id="happymech"/>	
	<div id="quality">
		<h1>Quality Commitment Comprehension</h1>
		<p>
			These principles form the foundation of our leadership philosophy. It is essential that we not only understand 
			our products but also effectively convey their value. We are dedicated to meeting our customer's unique 
			needs. By fostering strong relationships and open communication, we aim to ensure that our customers 
			feel valued and well-informed throughout their journey with us. This approach enhances customer satisfaction 
			and builds trust in our brand.
		</p>
	</div>
	<div id="values">
		<h2>Belief In Our Product</h2>
		<p>	We are passionate about what we're selling and stand behind it, knowing it's quality.<br /><br /></p>
		<h2><br />Financial Knowledge</h2>
		<p>We know our products and can help guide you to the best purchase for your unique needs<br /><br /></p>
		<h2><br />Open Communication</h2>
		<p>We are excited to communicate with you so that you are well-informed throughout your journey with us</p>
	</div>
	
	<div id="sliders">
		<h1 id="slider3h1">WE BRING A LIFETIME OF VALUES</h1>
		<div class="slider3">		
				<img src="images/brothers1.jpg">
				<img src="images/brothers2.jpg">
				<img src="images/brothers3.jpg">
				<img src="images/3brothers.jpg">
				<img src="images/evan1.jpg">
		</div>	
		<div class="mediumslider3">		
				<img src="images/brothers1.jpg">
				<img src="images/brothers2.jpg">
				<img src="images/brothers3.jpg">
				<img src="images/3brothers.jpg">
				<img src="images/evan1.jpg">
		</div>	
		<div class="smallslider3">		
				<img src="images/brothers1.jpg">
				<img src="images/brothers2.jpg">
				<img src="images/brothers3.jpg">
				<img src="images/3brothers.jpg">
				<img src="images/evan1.jpg">
		</div>	
	</div>
			
	<?php include("footer.inc.php"); ?>
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>

    <script>
		  $('.slider3').slick({
			 slidesToShow: 3,
			slidesToScroll: 1,
			arrows: true,
			dots: true,
			centerMode: true,
			variableWidth: true,
			centerPadding: '60px',
			});
		
    </script>
	
	 <script>
		  $('.smallslider3').slick({
			 slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			dots: true,
			});
    </script> 
	 <script>
		  $('.mediumslider3').slick({
			 slidesToShow: 2,
			slidesToScroll: 1,
			arrows: true,
			dots: true,
			
			});
    </script> 
	

	





