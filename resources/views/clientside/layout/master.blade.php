<!doctype html>


<html lang="en" class="no-js">
<head>
	<title>Demo</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<link rel="stylesheet" href="css/triptip-assets.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

	<!-- Container -->
	<div id="container">
	@include('clientside.layout.header')

	@yield('content')	
	@include('clientside.layout.footer')

	</div>
	<!-- End Container -->
	
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.migrate.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4gPr8l64tU0pr14seWWK5BZiWb0-FC3k"></script>
	<script src="js/triptip-plugins.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.countTo.js"></script>
	<script src="js/script.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
	<script type="text/javascript">
		$(function() {
			//price
	$( "#slider-range" ).slider({
	  range: true,
	  min: 130,
	  max: 500,
	  values: [ 130, 250 ],
	  slide: function( event, ui ) {
		$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
	  }
	});
	$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
	  " - $" + $( "#slider-range" ).slider( "values", 1 ) );

	//price per hour
	$( "#slider-range2" ).slider({
	  range: true,
	  min: 130,
	  max: 500,
	  values: [ 130, 250 ],
	  slide: function( event, ui ) {
		$( "#amount1" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
	  }
	});
	$( "#amount1" ).val( "$" + $( "#slider-range2" ).slider( "values", 0 ) +
	  " - $" + $( "#slider-range2" ).slider( "values", 1 ) );

//duration
	$( "#slider-range3" ).slider({
	  range: true,
	  min: 1,
	  max: 12,
	  values: [ 130, 250 ],
	  slide: function( event, ui ) {
		$( "#amount3" ).val( ui.values[ 0 ] + "Month " + " - " + ui.values[ 1 ] + " Month");
	  }
	});
	$( "#amount3" ).val( $( "#slider-range3" ).slider( "values", 0 ) + "Month to" +
	   $( "#slider-range3" ).slider( "values", 1 ) + "Month" );

//Brand Slider


 $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });



});

		
	</script>
	
</body>
</html>