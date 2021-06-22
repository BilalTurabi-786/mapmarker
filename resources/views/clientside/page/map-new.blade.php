@extends('clientside.layout.master')

@section('title', 'Map')

@section('headname','Map')

@section('content')

	<style type="text/css">



		/* Filter Working */

		.drop-down.active div#dropDown {

			background: linear-gradient(to right,#002998, #93a5d8) !important;

		}

		a.filter-btn.active {

			background-color: #0016b1 !important;

		}

		.cursor-pointer {

			cursor: pointer;

		}

		.filter-badge {

			font-size: 15px;

		}



		/* Filter Working */



		.price-range-slider {

			width:100%;

			float:left;

			padding:10px 20px;

			.range-value {

				margin:0;

				input {

					width:100%;

					background:none;

					color: #000;

					font-size: 16px;

					font-weight: initial;

					box-shadow: none;

					border: none;

					margin: 20px 0 20px 0;

				}

			}



			.range-bar {

				border: none;

				background: #000;

				height: 3px;

				width: 96%;

				margin-left: 8px;



				.ui-slider-range {

					background:#06b9c0;

				}



				.ui-slider-handle {

					border:none;

					border-radius:25px;

					background:#fff;

					border:2px solid #06b9c0;

					height:17px;

					width:17px;

					top: -0.52em;

					cursor:pointer;

				}

				.ui-slider-handle + span {

					background:#06b9c0;

				}

			}

		}



		/* Slider */



		.slick-slide {

			margin: 0px 20px;

		}



		.slick-slide img {

			width: 100%;

		}



		.slick-slider

		{

			position: relative;

			display: block;

			box-sizing: border-box;

			-webkit-user-select: none;

			-moz-user-select: none;

			-ms-user-select: none;

			user-select: none;

			-webkit-touch-callout: none;

			-khtml-user-select: none;

			-ms-touch-action: pan-y;

			touch-action: pan-y;

			-webkit-tap-highlight-color: transparent;

		}



		.slick-list

		{

			position: relative;

			display: block;

			overflow: hidden;

			margin: 0;

			padding: 0;

		}

		.slick-list:focus

		{

			outline: none;

		}

		.slick-list.dragging

		{

			cursor: pointer;

			cursor: hand;

		}



		.slick-slider .slick-track,

		.slick-slider .slick-list

		{

			-webkit-transform: translate3d(0, 0, 0);

			-moz-transform: translate3d(0, 0, 0);

			-ms-transform: translate3d(0, 0, 0);

			-o-transform: translate3d(0, 0, 0);

			transform: translate3d(0, 0, 0);

		}



		.slick-track

		{

			position: relative;

			top: 0;

			left: 0;

			display: block;

		}

		.slick-track:before,

		.slick-track:after

		{

			display: table;

			content: '';

		}

		.slick-track:after

		{

			clear: both;

		}

		.slick-loading .slick-track

		{

			visibility: hidden;

		}



		.slick-slide

		{

			display: none;

			float: left;

			height: 100%;

			min-height: 1px;

		}

		[dir='rtl'] .slick-slide

		{

			float: right;

		}

		.slick-slide img

		{

			display: block;

		}

		.slick-slide.slick-loading img

		{

			display: none;

		}

		.slick-slide.dragging img

		{

			pointer-events: none;

		}

		.slick-initialized .slick-slide

		{

			display: block;

		}

		.slick-loading .slick-slide

		{

			visibility: hidden;

		}

		.slick-vertical .slick-slide

		{

			display: block;

			height: auto;

			border: 1px solid transparent;

		}

		.slick-arrow.slick-hidden {

			display: none;

		}

		.explore__form-checkbox-list li {

			float: left;

			width: 100%;

			position: relative;

			list-style: none;

			margin-bottom: 0.25rem;

		}

		.select2-container--default .select2-selection--multiple {

			background-color: #fff;

			border: none;

			border-radius: 4px;

			cursor: text;

			width: 100% !important;

			max-width: 1000px !important;

			min-width: 1326%;

			min-height: auto;

			border-bottom: 1px solid red;

		}

		/*.modal-lg {

			max-width: 1300px;

		}*/

		.modal{

			z-index: 99999999;

		}

		.my-row

		{

			width: 100%;

			position: relative;

			right: -3%;

			font-size: 3px;

		}

		a.btn.btn-primary.w-30 {

			width: 24%;

		}

		#map {

			height: 50rem;

			width: 100%;

			z-index: 990;

		}

		.col-sm-4.mt-2.mb-2 {

			padding: 0px;

			margin-top: -4px !important;

			margin-right: -84px;

			margin-left: 44px;

		}

		a.btn.btn-primary.w-100 {

			width: 75% !important;

		}

		button.gm-control-active.gm-fullscreen-control {

		display: none;

		}

		@media(max-width: 992px){

			.my-row

			{

				width: 142%;

				position: relative;

				right: 18%;

				font-size: 3px;

			}

		}

		.table_center{

			display:table-cell;

			vertical-align: middle;

		}

		.drop-down{

			display: inline-block;

			position: relative;

		}



		.drop-down__button{

		background: linear-gradient(to right,#3d6def, #8FADFE);

		display: inline-block;

		line-height: 40px;

		padding: 0 18px;

		text-align: left;

		border-radius: 4px;

		box-shadow: 0px 4px 6px 0px rgba(0,0,0,0.2);

		cursor: pointer;

		}



		.drop-down__name {

			font-size: 9px;

			text-transform: uppercase;

			color: #fff;

			font-weight: 800;

			letter-spacing: 2px;

		}



		.drop-down__icon {

			width: 18px;

			vertical-align: middle;

			margin-left: 14px;

			height: 18px;

			border-radius: 50%;

			transition: all 0.4s;

		-webkit-transition: all 0.4s;

		-moz-transition: all 0.4s;

		-ms-transition: all 0.4s;

		-o-transition: all 0.4s;



		}







		.drop-down__menu-box {

			position: absolute;

			width: 100%;

			left: 0;

			background-color: #fff;

			border-radius: 4px;

			box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.2);

			transition: all 0.3s;

			-webkit-transition: all 0.3s;

			-moz-transition: all 0.3s;

			-ms-transition: all 0.3s;

			-o-transition: all 0.3s;

			visibility: hidden;

			opacity: 0;

			margin-top: 5px;

		}



		.drop-down__menu {

			margin: 0;

			padding: 0 13px;

			list-style: none;



		}

		.drop-down__menu-box:before{

            content:'';

            background-color: transparent;

            border-right: 8px solid transparent;

            position: absolute;

            border-left: 8px solid transparent;

            border-bottom: 8px solid #fff;

            border-top: 8px solid transparent;

            top: -15px;

            left: 22px;

		}


		.drop-down__menu-box:after{

		content:'';

		background-color: transparent;

		}



		.drop-down__item {

			font-size: 13px;

			padding: 13px 0;

			text-align: left;

			font-weight: 500;

			color: #909dc2;

			cursor: pointer;

			position: relative;

			border-bottom: 1px solid #e0e2e9;

		}



		.drop-down__item-icon {

			width: 15px;

			height: 15px;

			position: absolute;

			right: 0px;

			fill: #8995b6;



		}



		.drop-down__item:hover .drop-down__item-icon{

		fill: #3d6def;

		}



		.drop-down__item:hover{

		color: #3d6def;

		}







		.drop-down__item:last-of-type{

		border-bottom: 0;

		}





		.drop-down--active .drop-down__menu-box{

			visibility: visible;

			opacity: 1;

			margin-top: 15px;

			z-index: 999;

			width: 300px;

		}



		.drop-down__item:before{

			content:'';

			position: absolute;

			width: 3px;

			height: 28px;

			background-color: #3d6def;

			left: -13px;

			top: 50%;

			transform: translateY(-50%);

			display:none;

		}



		.drop-down__item:hover:before{

		display:block;

		}

	</style>

    <style>

        .drop-down__menu-box.third-person{
            right: -14px;
            left: -156px;
        }
        .drop-down__menu-box.third-person:before{
            left: 190px
        }
    </style>

	<div class="row">

		<!-- map block

        ================================================== -->

        <div class="col-md-6 map-wrapper">

            <div id="map" data-map-zoom="9"></div>

        </div>

        <!-- End map block -->



        <!-- explore-module

        ================================================== -->

        <section class="col-md-6 explore">

            <div class="container">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="explore__filter">

                            <h2 class="explore__form-title">

                                Filter Listings

                            </h2>

                            @livewire('filters', compact('filters', 'data'))

                        </div>

                    </div>

                </div>

            </div>

        </section>

		<!-- End explore-module -->

	</div>

	<!-- Banner -->

	<div class="mt-3 row">

		<div class="col-md-12">

			<div class="explore__advertise">

				<section class="customer-logos slider">

					<div class="slide"><img src="https://image.freepik.com/free-vector/luxury-letter-e-logo-design_1017-8903.jpg"></div>

					<div class="slide"><img src="https://image.freepik.com/free-vector/3d-box-logo_1103-876.jpg"></div>

					<div class="slide"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"></div>

					<div class="slide"><img src="https://image.freepik.com/free-vector/colors-curl-logo-template_23-2147536125.jpg"></div>

					<div class="slide"><img src="https://image.freepik.com/free-vector/abstract-cross-logo_23-2147536124.jpg"></div>

					<div class="slide"><img src="https://image.freepik.com/free-vector/football-logo-background_1195-244.jpg"></div>

					<div class="slide"><img src="https://image.freepik.com/free-vector/background-of-spots-halftone_1035-3847.jpg"></div>

					<div class="slide"><img src="https://image.freepik.com/free-vector/retro-label-on-rustic-background_82147503374.jpg"></div>

				</section>

			</div>

		</div>

	</div>

	<!-- Banner -->
    {{-- {{ dd($data['duration'][0]) }} --}}

@endsection

@section('scripts')

	<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

	<script src="{{ asset('app-assets/js/alpine.js') }}"></script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkDVoYKraeOI78AEWyax38cSnf7Gi19Lo&callback=initMap&libraries=&v=weekly" defer></script>

	<script>



		let map, infoWindow;



		function initMap() {

			var location_window = 0;

			const iconBase ="https://developers.google.com/maps/documentation/javascript/examples/full/images/";



			map = new google.maps.Map(document.getElementById("map"), {

				center: { lat: -34.397, lng: 150.644 },

				zoom: 6,



			});

			infoWindow = new google.maps.InfoWindow();

			const locationButton = document.createElement("button");

			locationButton.textContent = "Pan to Current Location";

			locationButton.classList.add("custom-map-control-button");

			map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);

			locationButton.addEventListener("click", () => {

				// Try HTML5 geolocation.

				if (navigator.geolocation) {

					navigator.geolocation.getCurrentPosition(

						(position) => {

							const pos = {

								lat: position.coords.latitude,

								lng: position.coords.longitude,

							};

							infoWindow.setPosition(pos);

							infoWindow.setContent("Location found.");

							infoWindow.open(map);

							map.setCenter(pos);

						},

						() => {

							handleLocationError(true, infoWindow, map.getCenter());

						}

						);

				} else {

					// Browser doesn't support Geolocation

					handleLocationError(false, infoWindow, map.getCenter());

				}

			});

			const marker = new google.maps.Marker({

				position: { lat: -25.344, lng: 131.036 },

				map: map,

				icon:  {

					url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png"

				}



			});

			// google.maps.event.addListener(map,'click',function(e) {

			//   location_window++;



			//   addmarker({

			//     coordinates: e.latLng,

			//     content:"<div id='location_window_"+location_window+"' class='text-center' style='width:400px!important;'> <label>Enter Name</label><input class='form-control' type='text' id='name"+location_window+"' class='form-control'  ><label>Social Links</label><table><tbody id="+location_window+"> <tr class='colname'> <td>   <label>Link</label><input type='text' class='form-control links"+location_window+"' value=''> </td><td><button><i class='fa fa-plus' class='btn btn-primary' data-id="+location_window+"></i></button></td></tr></tbody></table> <h6>Enter Location Description</h6><textarea class='form-control' id='location_description_"+location_window+"' class='form-group' rows='5' col='15'></textarea><br /><input type='button' value='Save' class='btn btn-primary save' data-id="+location_window+"  data-lat="+e.latLng.lat()+" data-lng="+e.latLng.lng()+" /></div>",

			//   })





			//      });

			//      function addmarker(attributes){

			//       var marker = new google.maps.Marker({

			// 			position: attributes.coordinates,

			// 			map: map,

			//   icon:"{{asset('app-assets/mark1.png')}}"



			// 		});



			// 		var infoWindow = new google.maps.InfoWindow({

			// 			content: attributes.content

			// 		});



			// 		marker.addListener("click", function(){

			// 			infoWindow.open(map, marker);

			// 		});

			//      }

			$.ajax({

				url:"{{route('get-markers')}}",

				type:"get",

				success:function(res){

					data=res.markers;

					$(data).each(function (i,val){

						links="";



						$(val.links).each(function(j,val1){

							links=links+val1.link+"<br>";



						})

						console.log(links);

						var marker = new google.maps.Marker({

							position: {lat: parseFloat(val.latitude.substring(0,8)), lng: parseFloat(val.langitude.substring(0,8))},

							map: map,

							icon:"{{asset('app-assets/mark1.png')}}"

						});



						var infoWindow = new google.maps.InfoWindow({



							content:"<h6>Name:"+val.mark_name+"</h6> <br><h6>Links: "+links+"</h6><br> <h6>Description: "+val.mark_description+" </h6>"

						});





						marker.addListener("click", function(){

							infoWindow.open(map, marker);

						});

					})

				}

			})

		}



		/**  Filter Working  */

		function filterMarker(){

			$.ajax({

				url:"{{route('filter-markers')}}",

				type:"post",

				data: {

					"_token":"{{ csrf_token()}}"

				},

				success:function(res){

					data=res.markers;

					$(data).each(function (i,val){

						links="";



						$(val.links).each(function(j,val1){

							links=links+val1.link+"<br>";



						})

						console.log(links);

						var marker = new google.maps.Marker({

							position: {lat: parseFloat(val.latitude.substring(0,8)), lng: parseFloat(val.langitude.substring(0,8))},

							map: map,

							icon:"{{asset('app-assets/mark1.png')}}"

						});



						var infoWindow = new google.maps.InfoWindow({



							content:"<h6>Name:"+val.mark_name+"</h6> <br><h6>Links: "+links+"</h6><br> <h6>Description: "+val.mark_description+" </h6>"

						});





						marker.addListener("click", function(){

							infoWindow.open(map, marker);

						});

					})

				}

			});

		}



		function handleLocationError(browserHasGeolocation, infoWindow, pos) {

			infoWindow.setPosition(pos);

			infoWindow.setContent(

				browserHasGeolocation

				? "Error: The Geolocation service failed."

				: "Error: Your browser doesn't support geolocation."

				);

			infoWindow.open(map);

		}

		$(document).on("click",".fa-plus",function(){

			id=$(this).data("id");

			var $clone = $('tr.colname:first').clone();

			console.log($clone);

			$clone.append("<td><div class='rmv' ><i class='fa fa-trash text-danger'></i></div></td>");

			$("#1").append($clone);

		})

		$(document).on('click', '.rmv', function () {



			$(this).closest('tr').remove();



		});

		// onclick='save_location("+location_window+", "+e.latLng.lat()+", "+e.latLng.lng()+")'

		$(document).on("click",".save",function (){

			id=$(this).data("id");

			name=$("#name"+id).val();

			description=$("#location_description_"+id).val();

			latitude=$(this).data("lat");

			langitude=$(this).data("lng");

			// alert(langitude);

			// alert(latitude);





			const links=[];

			link1=$(".links"+id).each(function(i,val){

				links.push($(val).val());

			});

			$.ajax({

				url:"{{route('admin.google-map-process')}}",

				data:{links:links,name:name,description:description,latitude:latitude,langitude:langitude,"_token":"{{csrf_token()}}"},

				type:"post",

				success:function(res){

					console.log(res);

				}

			})

		})

        /*

		$(document).ready(()=>{



			console.clear();

			// Filter Working

			let sampleFilter = () => {

				let obj = {

					"lesson": "",

					"duration": "March 2010-January 2021",

					"price": "$130 - $250",

					"pricePerHour": "$130 - $250",

					"studentTeacherRatio": "130 - 250",

					"association": ["all"],

					"handicap": ["no"],

					"children": ["no"],

					"storage": {

						"duration": ["all"],

						"pricePerDay": "$0 - $200"

					},

					"rental": {

						"rentalPerPerson": [],

						"duration": ["all"],

						"pricePerHour": "$0 - $200"

					},

					"lessons": {

						"studentTeacherRatio": "1 - 10",

						"duration": "Days1 - Days10",

						"courseHours": "0 - 40",

						"pricePerTeachingHours": "$0 - $200",

					},

					"camp": {

						"studentTeacherRatio": "1 - 10",

						"duration": "Days1 - Days10",

						"courseHours": "0 - 40",

						"pricePerTeachingHours": "$0 - $200",

					},

					"courseLevel": "all"

				}

				return obj;

			};

			let filters = [

				sampleFilter(), {}, {}

			]

			let wrapper = $(".drop-down.active .filter-wrapper");

			let activePerson = 0;

			$("#slider-range10").on("slidestop", (e, ui) => {

				let ele = $(e.target).siblings('.range-value').find('input');

				filters[activePerson].duration = ele.val();



				wrapper.find('.filter-item[data-type=duration]').remove();

				filterEle = wrapper.find(".filter-item.d-none").clone();

				filterEle.attr('data-type', 'duration')

				filterEle.removeClass("d-none");

				filterEle.find("span.filter-name").html("duration: "+ele.val());

				filterEle.appendTo(wrapper);

			});

			$("#slider-range").on("slidestop", (e, ui) => {

				let ele = $(e.target).siblings('.range-value').find('input');

				(filters[activePerson]).price = ele.val();



				wrapper.find('.filter-item[data-type=price]').remove();

				filterEle = wrapper.find(".filter-item.d-none").clone();

				filterEle.attr('data-type', 'price')

				filterEle.removeClass("d-none");

				filterEle.find("span.filter-name").html("price: "+ele.val());

				filterEle.appendTo(wrapper);

			});

			$(".drop-down").on("click", ".remove-filter.cursor-pointer", (e) => {

				let ele = $(e.target)

				let liParent = ele.parents("li");

				let parent = liParent.parents(".drop-down");

				let index = $(".drop-down").index(parent);

				if(liParent.data('type') == "lesson"){

					console.log(activePerson, index);

					if(activePerson == index){

						$(".filter-btn[data-val="+filters[index].lesson+"]").removeClass('active');

					}

					filters[index].lesson = "";

					liParent.remove();

				}

			});

			$(".filter-btn").click((e) => {

				e.preventDefault();

				let ele = $(e.target);

				let val = ele.data('val');

				if(ele.hasClass('reset-filter')){

					// console.log("reset");

					wrapper.find(".filter-item").not(".d-none").remove();

					if(activePerson > 0){

						filters[activePerson] = sampleFilter();

					}

					$(".filter-btn.active").removeClass("active");

				}

				else if(!val) {}

				else if(ele.hasClass('active')){

					console.log("removeFilter");

					ele.removeClass("active");

					wrapper.find('.filter-item[data-type=lesson]').remove();

					filters[activePerson].lesson = "";

				}

				else{

					$(".filter-btn").removeClass("active");

					ele.addClass('active');

					filters[activePerson].lesson = val;

					wrapper.find('.filter-item[data-type=lesson]').remove();

					filterEle = wrapper.find(".filter-item.d-none").clone();

					filterEle.attr('data-type', 'lesson')

					filterEle.removeClass("d-none");

					filterEle.find("span.filter-name").html("Type: "+val);

					filterEle.appendTo(wrapper);

				}

			});

			$(".dropDown.drop-down__button").click(function(e){

				console.log(filters[activePerson].duration);



				$('.drop-down').removeClass('active');

				$(this).parents('.drop-down').addClass('active');

				activePerson = $(".dropDown.drop-down__button").index(this);

				wrapper = $(".drop-down.active .filter-wrapper");

				if(Object.keys(filters[activePerson]).length == 0){

					filters[activePerson] = sampleFilter();

				}

				// console.log(filters);

				// console.log(filters[activePerson]);

				// Filter Btn

				$(".filter-btn").removeClass('active');

				if(filters[activePerson].lesson != ""){

					$(".filter-btn[data-val='"+filters[activePerson].lesson+"']").addClass("active");

				}

				// Duration Slider

				$("#amount10").val(filters[activePerson].duration);

				let durations = filters[activePerson].duration.split("-");



				durations[0] = durations[0].split(" ");

				console.log(durations);



				$("#slider-range10").slider("values", 0, Math.round(new Date(durations[0][1], getMonthFromString(durations[0][0])).getTime()));

				durations[1] = durations[1].split(" ");



				// console.log(Math.round(new Date(durations[1][1], getMonthFromString(durations[1][0])).getTime()));



				// console.log(Math.round(new Date(durations[0][1], getMonthFromString(durations21[0][0])).getTime()));





				$("#slider-range10").slider("values", 1, Math.round(new Date(durations[1][1], getMonthFromString(durations[1][0])).getTime()));

				// Price Slider

				$("#amount").val(filters[activePerson].price);

				let prices = filters[activePerson].price.split(" - ");

				$("#slider-range").slider("values", 0, prices[0].replace("$", ""));

				$("#slider-range").slider("values", 1, prices[1].replace("$", ""));

			});

			// $(".dropDown.drop-down__button").eq(0).trigger("click")

			function getMonthFromString(mon){

				return new Date(Date.parse(mon +" 1, 2012")).getMonth()+1

			}

		});

        */

	</script>

	<script>

		/** Sliders */

			//price
			$( "#slider-range" ).slider({

				range: true,

				min: parseInt("{{$data['price'][0]}}"),

				max: parseInt("{{$data['price'][1]}}"),

				values: [ parseInt("{{$data['price'][0]}}"), parseInt("{{$data['price'][1]}}") ],

				slide: function( event, ui ) {

					$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );

				}

			});

			$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +

				" - $" + $( "#slider-range" ).slider( "values", 1 ) );



			//price per hour

			$( "#slider-range2" ).slider({

				range: true,

				min: parseInt("{{$data['price'][0]}}"),

				max: parseInt("{{$data['price'][1]}}"),

				values: [ parseInt("{{$data['price'][0]}}"), parseInt("{{$data['price'][1]}}") ],

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

            let duration = [
                "{{ Carbon\Carbon::createFromFormat('Y-m-d', $data['duration'][0])->toW3cString() }}",
                "{{ Carbon\Carbon::createFromFormat('Y-m-d', $data['duration'][1])->toW3cString() }}"
            ]
            console.log(duration);

			$( "#slider-range3" ).slider({

				range: true,

				min: new Date(duration[0]).getTime(),

				max: new Date(duration[1]).getTime(),

				step: 86400000,

				values: [ new Date(duration[0]).getTime(), new Date(duration[1]).getTime() ],

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

				min: new Date(duration[0]).getTime(),

				max: new Date(duration[1]).getTime(),

				step: 86400000,

				values: [ new Date(duration[0]).getTime(), new Date(duration[1]).getTime() ],

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

            let range = [
                parseInt("{{$data['student_teacher_ratio'][0]}}"),
                parseInt("{{$data['student_teacher_ratio'][1]}}")
            ];
            console.log(range);
			$( "#slider-range12" ).slider({

				range: true,

				min: range[0],

				max: range[1],

				values: [ range[0], range[1]+120 ],

				slide: function( event, ui ) {

					$( "#amount12" ).val(  ui.values[ 0 ] + " - " + ui.values[ 1 ] );

				}

			});

			$( "#amount12" ).val(  $( "#slider-range12" ).slider( "values", 0 ) +

				" - " + $( "#slider-range12" ).slider( "values", 1 ) );

		/** Sliders */

	</script>

	<script>

		$(document).ready(function(){

			$(".lesson").click(function(){

				$("#lessonandcamp").removeClass("d-none");

				$("#rental").addClass("d-none");

				$("#storage").addClass("d-none");

			});



			$(".camp").click(function(){

				$("#lessonandcamp").removeClass("d-none");

				$("#rental").addClass("d-none");

				$("#storage").addClass("d-none");

			});



			$(".rental").click(function(){

				$("#lessonandcamp").addClass("d-none");

				$("#rental").removeClass("d-none");

				$("#storage").addClass("d-none");

			});



			$('.storage').click(function(){

				$("#lessonandcamp").addClass("d-none");

				$("#rental").addClass("d-none");

				$("#storage").removeClass("d-none");

			});

		});

	</script>



	<!-- ren -->

	<!-- lessonandcamp -->

	<div class="modal fade" id="lessonandcamp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

		<div class="modal-dialog modal-lg">

			<div class="modal-content">

				<div class="modal-header">

					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">

						<span aria-hidden="true">&times;</span>

					</button>

				</div>

				<div class="modal-body">

					<div class="accordion" id="accordionExample">



					<div class="accordion-item">

						<h2 class="accordion-header" id="headingOne">

						<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOOnne" aria-expanded="true" aria-controls="collapseOOnne">

							Student / Teacher ratio

						</button>

						</h2>

						<div id="collapseOOnne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">

						<div class="accordion-body">

								<div class="card">

								<div class="card-body">

									<div class="price-range-slider">

										<p class="range-value">

											<b>Ratio :</b>

											<input type="text" id="amount4" readonly style="border: none;">

										</p>

										<div id="slider-range4" class="range-bar"></div>

									</div>

								</div>

							</div>

						</div>

						</div>

					</div>

					<div class="accordion-item">

						<h2 class="accordion-header" id="headingOne">

						<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOOne" aria-expanded="true" aria-controls="collapseOOne">

							Duration

						</button>

						</h2>

						<div id="collapseOOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">

						<div class="accordion-body">

								<div class="card">

								<div class="card-body">

									<div class="price-range-slider">

										<p class="range-value">

											<b>Duration :</b>

											<input type="text" id="amount5" readonly style="border: none;">

										</p>

										<div id="slider-range5" class="range-bar"></div>

									</div>

								</div>

							</div>

						</div>

						</div>

					</div>

					<div class="accordion-item">

						<h2 class="accordion-header" id="headingTwo">

						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTTwo" aria-expanded="false" aria-controls="collapseTTwo">

							Course Hours

						</button>

						</h2>

						<div id="collapseTTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">

						<div class="accordion-body">

							<div class="card">

								<div class="card-body">

									<div class="price-range-slider">

										<p class="range-value">

											<b>Hours :</b>

											<input type="text" id="amount6" readonly style="border: none;">

										</p>

										<div id="slider-range6" class="range-bar"></div>

									</div>

								</div>

							</div>

						</div>

						</div>

					</div>

					<div class="accordion-item">

						<h2 class="accordion-header" id="headingThree">

						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreee" aria-expanded="false" aria-controls="collapseThreee">

							Price per Teaching hours

						</button>

						</h2>

						<div id="collapseThreee" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">

						<div class="accordion-body">

							<div class="card">

								<div class="card-body">

									<div class="price-range-slider">

										<p class="range-value">

											<b>Hours :</b>

											<input type="text" id="amount7" readonly style="border: none;">

										</p>

										<div id="slider-range7" class="range-bar"></div>

									</div>

								</div>

							</div>

						</div>

						</div>

					</div>

					</div>

				</div>

				<div class="modal-footer">

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

					<button type="button" class="btn btn-primary">Save changes</button>

				</div>

			</div>

		</div>

	</div>



	<!-- lessonandcamp -->

	<!-- storage -->

	<div class="modal fade" id="storage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

		<div class="modal-dialog modal-lg">

			<div class="modal-content">

				<div class="modal-header">

					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">

						<span aria-hidden="true">&times;</span>

					</button>

				</div>

				<div class="modal-body">

					<!-- Rental -->

					<div class="accordion" id="accordionExample">

					<div class="accordion-item">

						<h2 class="accordion-header" id="headingOne">

						<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#storageCollapseOne" aria-expanded="true" aria-controls="storageCollapseOne">

							Rentals per person

						</button>

						</h2>

						<div id="storageCollapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">

						<div class="accordion-body">

								<div class="card">

								<div class="card-body">

									<ul class="explore__form-checkbox-list">

										<li>

											<input class="explore__input-checkbox" type="radio" name="storage_set" value="1 Set"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">1 Set</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="radio" name="storage_set" value="2 Sets"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">2 Sets</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="radio" name="storage_set" value="3 Sets"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">3 Sets</span>

										</li>

									</ul>

								</div>

							</div>

						</div>

						</div>

					</div>

					<div class="accordion-item">

						<h2 class="accordion-header" id="headingTwo">

						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#storageCollapseTwo" aria-expanded="false" aria-controls="storageCollapseTwo">

							Duration

						</button>

						</h2>

						<div id="storageCollapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">

						<div class="accordion-body">

							<div class="card">

								<div class="card-body">

									<ul class="explore__form-checkbox-list">

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="storage_duration[]" value="All"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">All (Default)</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="storage_duration[]" value="1 hour"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">1 hour</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="storage_duration[]" value="2 hours"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">2 hours</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="storage_duration[]" value="3 hours"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">3 hours</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="storage_duration[]" value="Half day"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">Half day</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="storage_duration[]" value="Day"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">Day</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="storage_duration[]" value="2 days"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">2 days</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="storage_duration[]" value="3 days"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">3 days</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="storage_duration[]" value="4 days"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">4 days</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="storage_duration[]" value="5 days"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">5 days</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="storage_duration[]" value="Week"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">Week</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="storage_duration[]" value="10 days"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">10 days</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="storage_duration[]" value="2 weeks"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">2 weeks</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="storage_duration[]" value="3 weeks"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">3 weeks</span>

										</li>

									</ul>

								</div>

							</div>

						</div>

						</div>

					</div>

					{{-- <div class="accordion-item">

						<h2 class="accordion-header" id="headingThree">

						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">

							Price per Hour

						</button>

						</h2>

						<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">

						<div class="accordion-body">

							<div class="card">

								<div class="card-body">

									<div class="price-range-slider">

										<p class="range-value">

											<b>Duration :</b>

											<input type="text" id="amount8" readonly style="border: none;">

										</p>

										<div id="slider-range8" class="range-bar"></div>

									</div>

								</div>

							</div>

						</div>

						</div>

					</div> --}}

					</div>

					<!-- Rental -->

				</div>

				<div class="modal-footer">

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

					<button type="button" class="btn btn-primary">Save changes</button>

				</div>

			</div>

		</div>

	</div>

	<!-- storage -->

	<!-- rental -->

	<div class="modal fade" id="rental" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

		<div class="modal-dialog modal-lg">

			<div class="modal-content">

				<div class="modal-header">

					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">

						<span aria-hidden="true">&times;</span>

					</button>

				</div>

				<div class="modal-body">

					<!-- Rental -->

					<div class="accordion" id="accordionExample">

					<div class="accordion-item">

						<h2 class="accordion-header" id="headingOne">

						<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

							Rentals per person

						</button>

						</h2>

						<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">

						<div class="accordion-body">

								<div class="card">

								<div class="card-body">

									<ul class="explore__form-checkbox-list">

										<li>

											<input class="explore__input-checkbox" type="radio" name="rental_set" value="1 Set"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">1 Set</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="radio" name="rental_set" value="2 Sets"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">2 Sets</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="radio" name="rental_set" value="3 Sets"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">3 Sets</span>

										</li>

									</ul>

								</div>

							</div>

						</div>

						</div>

					</div>

					<div class="accordion-item">

						<h2 class="accordion-header" id="headingTwo">

						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

							Duration

						</button>

						</h2>

						<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">

						<div class="accordion-body">

							<div class="card">

								<div class="card-body">

									<ul class="explore__form-checkbox-list">

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="rental_duration[]" value="All"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">All (Default)</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="rental_duration[]" value="1 hour"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">1 hour</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="rental_duration[]" value="2 hours"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">2 hours</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="rental_duration[]" value="3 hours"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">3 hours</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="rental_duration[]" value="Half day"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">Half day</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="rental_duration[]" value="Day"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">Day</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="rental_duration[]" value="2 days"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">2 days</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="rental_duration[]" value="3 days"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">3 days</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="rental_duration[]" value="4 days"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">4 days</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="rental_duration[]" value="5 days"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">5 days</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="rental_duration[]" value="Week"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">Week</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="rental_duration[]" value="10 days"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">10 days</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="rental_duration[]" value="2 weeks"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">2 weeks</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="checkbox" name="rental_duration[]" value="3 weeks"/>

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">3 weeks</span>

										</li>

									</ul>

								</div>

							</div>

						</div>

						</div>

					</div>

					{{-- <div class="accordion-item">

						<h2 class="accordion-header" id="headingThree">

						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">

							Price per Hour

						</button>

						</h2>

						<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">

						<div class="accordion-body">

							<div class="card">

								<div class="card-body">

									<div class="price-range-slider">

										<p class="range-value">

											<b>Duration :</b>

											<input type="text" id="amount8" readonly style="border: none;">

										</p>

										<div id="slider-range8" class="range-bar"></div>

									</div>

								</div>

							</div>

						</div>

						</div>

					</div> --}}

					</div>

					<!-- Rental -->

				</div>

				<div class="modal-footer">

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

					<button type="button" class="btn btn-primary">Save changes</button>

				</div>

			</div>

		</div>

	</div>

	<!-- rental -->

	<!-- Association -->

	<div class="modal fade" id="Association" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

		<div class="modal-dialog modal-lg">

			<div class="modal-content">

				<div class="modal-header">

					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">

						<span aria-hidden="true">&times;</span>

					</button>

				</div>

				<div class="modal-body">

					<div class="card">

							<div class="card-header">

								Association

							</div>

							<div class="card-body">

								<ul class="explore__form-checkbox-list">

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="association[]" id="association" value="All" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">All (default)</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="association[]" id="association" value="IKO" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">IKO</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="association[]" id="association" value="VDWS" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">VDWS</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="association[]" id="association" value="No Association" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">No Association</span>

									</li>

								</ul>

							</div>

						</div>

				</div>

				<div class="modal-footer">

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

					<button type="button" class="btn btn-primary">Save changes</button>

				</div>

			</div>

		</div>

	</div>

	<!-- Handicap -->

	<div class="modal fade" id="Handicap" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

		<div class="modal-dialog modal-lg">

			<div class="modal-content">

				<div class="modal-header">

					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">

						<span aria-hidden="true">&times;</span>

					</button>

				</div>

				<div class="modal-body">

					<div class="card">

							<div class="card-header">

								Handicap

							</div>

							<div class="card-body">

								<ul class="explore__form-checkbox-list">

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="handicap[]" id="handicap" value="No" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">No handicap (default)</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="handicap[]" id="handicap" value="Blind" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">Blind</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="handicap[]" id="handicap" value="Deaf" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">Deaf</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="handicap[]" id="handicap" value="Deaf/Mute" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">Deaf/Mute</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="handicap[]" id="handicap" value="Waist up" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">Waist up</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="handicap[]" id="handicap" value="Waist down" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">Waist down</span>

									</li>

								</ul>

							</div>

						</div>

				</div>

				<div class="modal-footer">

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

					<button type="button" class="btn btn-primary">Save changes</button>

				</div>

			</div>

		</div>

	</div>

	<!-- Children -->

	<div class="modal fade" id="Childern" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

		<div class="modal-dialog modal-lg">

			<div class="modal-content">

				<div class="modal-header">

					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">

						<span aria-hidden="true">&times;</span>

					</button>

				</div>

				<div class="modal-body">

					<div class="card">

							<div class="card-header">

								Childern

							</div>

							<div class="card-body">

								<ul class="explore__form-checkbox-list">

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="child[]" id="child" value="No" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">No (Default)</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="child[]" id="child" value="Age 5" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">Age 5</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="child[]" id="child" value="Age 6" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">Age 6</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="child[]" id="child" value="Age 7" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">Age 7</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="child[]" id="child" value="Age 8" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">Age 8</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="child[]" id="child" value="Age 9" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">Age 9</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="child[]" id="child" value="Age 10" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">Age 10</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="child[]" id="child" value="Age 11" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">Age 11</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="child[]" id="child" value="Age 12" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">Age 12</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="child[]" id="child" value="Age 13" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">Age 13</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="child[]" id="child" value="Age 14" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">Age 14</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="child[]" id="child" value="Age 15" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">Age 15</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="child[]" id="child" value="Age 16" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">Age 16</span>

									</li>

									<li>

										<input class="explore__input-checkbox" type="checkbox" name="child[]" id="child" value="Age 17" />

										<span class="explore__checkbox-style"></span>

										<span class="explore__checkbox-text">Age 17</span>

									</li>

								</ul>

							</div>

						</div>

				</div>

				<div class="modal-footer">

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

					<button type="button" class="btn btn-primary">Save changes</button>

				</div>

			</div>

		</div>

	</div>



	<!-- Course Level -->

	<div class="modal fade" id="courselevel" tabindex="-1" aria-labelledby="courselevel" aria-hidden="true">

		<div class="modal-dialog modal-lg">

			<div class="modal-content">

				<div class="modal-header">

					<h5 class="modal-title" id="courselevel">Modal title</h5>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">

						<span aria-hidden="true">&times;</span>

					</button>

				</div>

				<div class="modal-body">

					<div class="accordion" id="accordionExample">

						<div class="accordion-item">

						<h2 class="accordion-header" id="headingOne">

						<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOcOnne" aria-expanded="true" aria-controls="collapseOcOnne">

						Course Level

						</button>

						</h2>

						<div id="collapseOcOnne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">

						<div class="accordion-body">

							<div class="card">

								<div class="card-body">

									<ul class="explore__form-checkbox-list">

										<li>

											<input class="explore__input-checkbox" type="radio" name="course_level" id="course-level" value="All" />

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">All (default)</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="radio" name="course_level" id="course-level" value="Beginner" />

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">Beginner</span>

										</li>

										<li>

											<input class="explore__input-checkbox" type="radio" name="course_level" id="course-level" value="Intermediate" />

											<span class="explore__checkbox-style"></span>

											<span class="explore__checkbox-text">Intermediate</span>

										</li>

									</ul>

								</div>

							</div>

						</div>

						</div>

					</div>

				</div>

				</div>

				<div class="modal-footer">

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

					<button type="button" class="btn btn-primary">Save changes</button>

				</div>

			</div>

		</div>

	</div>

	<!-- Course Level -->

@endsection

