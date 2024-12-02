
<link rel="stylesheet" type="text/css" href="sliderteststyling.css"/>

<body>

<h1> Slick Carousel Center mode </h1>

<div class="slider">
  <div>
    <div class="slide-h3"><h3>
    1st slide
    </h3></div>
  </div>
  <div>
      <div class="slide-h3">
     <i class="fa fa-lg fa-trash"></i>
    <h3>
    2
    </h3></div>
  </div>
  <div>
   <div class="slide-h3">
     <i class="fa fa-lg fa-trash"></i>
    <h3>
    3
    </h3></div>
  </div>
  <div>
    <div class="slide-h3">
     <i class="fa fa-lg fa-trash"></i>
    <h3>
   4
    </h3></div>
  </div>
  <div>
     <div class="slide-h3">
     <i class="fa fa-lg fa-trash"></i>
    <h3>
    5
    </h3></div>
  </div>

</div>

 <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>

		
    	<link href="sliderteststyling.css" type="text/css" rel="stylesheet" >
<script type="text/javascript" src="slick/slick.min.js"></script>
<script>
   $('.slider').slick({
     centerMode: true,
     centerPadding: '60px',
     slidesToShow: 4,
     speed: 1500,
     index: 2,
     focusOnSelect:true,
     responsive: [{
       breakpoint: 768,
       settings: {
         arrows: true,
         centerMode: true,
         centerPadding: '40px',
         slidesToShow: 3
       }
     }, {
       breakpoint: 480,
       settings: {
         arrows: false,
         centerMode: true,
         centerPadding: '40px',
         slidesToShow: 1
       }
     }]
   });
 ;
</script>
	
 


