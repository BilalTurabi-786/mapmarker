<!doctype html>


<html lang="en" class="no-js">
<head>
	<title>Demo</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/triptip-assets.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/chosen.min.css">


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
	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4gPr8l64tU0pr14seWWK5BZiWb0-FC3k"></script> -->
	<script src="js/triptip-plugins.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.countTo.js"></script>
	<script src="js/script.js"></script>
	<script src="js/chosen.jquery.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
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
function formatDate(date) {
	var monthNames = [
	"January", "February", "March",
	"April", "May", "June", "July",
	"August", "September", "October",
	"November", "December"
	];

	var monthIndex = date.getMonth();
	var year = date.getFullYear();

	return monthNames[monthIndex] + ' ' + year;
}
$( "#slider-range3" ).slider({
	range: true,
	min: new Date('2010-01-01T00:00:00').getTime(),
	max: new Date('2021-01-01T00:00:00').getTime(),
	step: 86400000,
	values: [ new Date('2010-03-01T00:00:00').getTime(), new Date('2021-01-01T00:00:00').getTime() ],
	slide: function( event, ui ) {
		$( "#amount3" ).val( formatDate(new Date(ui.values[0])) + '-' + formatDate(new Date(ui.values[1])) );
	}
});
$( "#amount3" ).val( formatDate((new Date($( "#slider-range3" ).slider( "values", 0 )))) +
	" - " + formatDate((new Date($( "#slider-range3" ).slider( "values", 1 )))));

// Ratio Student Teacher
$( "#slider-range4" ).slider({
	range: true,
	min: 1,
	max: 10,
	values: [ 1, 10 ],
	slide: function( event, ui ) {
		$( "#amount4" ).val( ui.values[ 0 ] +  ui.values[ 1 ] );
	}
});
$( "#amount4" ).val(  $( "#slider-range4" ).slider( "values", 0 ) +
	" - " + $( "#slider-range4" ).slider( "values", 1 ) );

//Days Duration
$( "#slider-range5" ).slider({
	range: true,
	min: 1,
	max: 10,
	values: [ 1, 10 ],
	slide: function( event, ui ) {
		$( "#amount5" ).val( "Days" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
	}
});
$( "#amount5" ).val( "Days" + $( "#slider-range5" ).slider( "values", 0 ) +
	" - Days" + $( "#slider-range5" ).slider( "values", 1 ) );

// Hour Selection
$( "#slider-range6" ).slider({
	range: true,
	min: 0,
	max: 40,
	values: [ 0, 40 ],
	slide: function( event, ui ) {
		$( "#amount6" ).val(  ui.values[ 0 ] + " - " + ui.values[ 1 ] );
	}
});
$( "#amount6" ).val(  $( "#slider-range6" ).slider( "values", 0 ) +
	" - Hour" + $( "#slider-range6" ).slider( "values", 1 ) );

// price per teaching hour
$( "#slider-range7" ).slider({
	range: true,
	min: 0,
	max: 200,
	values: [ 0, 200 ],
	slide: function( event, ui ) {
		$( "#amount7" ).val(  ui.values[ 0 ] + " - " + ui.values[ 1 ] );
	}
});
$( "#amount7" ).val(  $( "#slider-range7" ).slider( "values", 0 ) +
	" -" + $( "#slider-range7" ).slider( "values", 1 ) );

//price per hour rental
$( "#slider-range8" ).slider({
	range: true,
	min: 0,
	max: 200,
	values: [ 0, 200 ],
	slide: function( event, ui ) {
		$( "#amount8" ).val(  ui.values[ 0 ] + " - " + ui.values[ 1 ] );
	}
});
$( "#amount8" ).val(  $( "#slider-range8" ).slider( "values", 0 ) +
	" -" + $( "#slider-range8" ).slider( "values", 1 ) );


// price per day last filter

$( "#slider-range9" ).slider({
	range: true,
	min: 0,
	max: 200,
	values: [ 0, 200 ],
	slide: function( event, ui ) {
		$( "#amount9" ).val(  ui.values[ 0 ] + " - " + ui.values[ 1 ] );
	}
});
$( "#amount9" ).val(  $( "#slider-range9" ).slider( "values", 0 ) +
	" -" + $( "#slider-range9" ).slider( "values", 1 ) );

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
function formatDate10(date) {
	var monthNames = [
	"January", "February", "March",
	"April", "May", "June", "July",
	"August", "September", "October",
	"November", "December"
	];

	var monthIndex = date.getMonth();
	var year = date.getFullYear();

	return monthNames[monthIndex] + ' ' + year;
}
$( "#slider-range10" ).slider({
	range: true,
	min: new Date('2010-01-01T00:00:00').getTime(),
	max: new Date('2021-01-01T00:00:00').getTime(),
	step: 86400000,
	values: [ new Date('2010-03-01T00:00:00').getTime(), new Date('2021-01-01T00:00:00').getTime() ],
	slide: function( event, ui ) {
		$( "#amount10" ).val( formatDate10(new Date(ui.values[0])) + '-' + formatDate10(new Date(ui.values[1])) );
	}
});
$( "#amount10" ).val( formatDate10((new Date($( "#slider-range10" ).slider( "values", 0 )))) +
	" - " + formatDate10((new Date($( "#slider-range10" ).slider( "values", 1 )))));

		
$( "#slider-range11" ).slider({
				range: true, 
				min: 130,
				max: 500,
				values: [ 130, 250 ],
				slide: function( event, ui ) {
					$( "#amount11" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
				}
			});
			$( "#amount11" ).val( "$" + $( "#slider-range11" ).slider( "values", 0 ) +
				" - $" + $( "#slider-range11" ).slider( "values", 1 ) );






		$(document).ready(function() {
			$('.js-example-basic-multiple').select2();
		});
		
	</script>
	@yield('scripts')
	
</body>
</html>