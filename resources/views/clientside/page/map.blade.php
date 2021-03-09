@extends('clientside.layout.master')
@section('title', 'Map')
@section('headname','Map')
@section('content')
	<style type="text/css">

		/* Filter Working */
		
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
  right: 18px;

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
    width: 100%;
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
	<div class="row">
		<!-- map block
			================================================== -->
			<div class="col-md-7 map-wrapper">
				<div id="map" data-map-zoom="9"></div>
			</div>
			<!-- End map block -->

			<!-- explore-module
			================================================== -->
			<section class="col-md-5 explore">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="explore__filter">
									<h2 class="explore__form-title">
										Filter Listings
									</h2>
									<div class="">
										<div class="row">
											<div class="col-md-4">
											<div class="table_center">
												<div class="drop-down">
													<div id="dropDown" class="dropDown drop-down__button">
													<span class="drop-down__name">Person 1</span>
													</div>
													
													<div class="drop-down__menu-box">
													<ul class="drop-down__menu">
														<li data-name="profile" class="drop-down__item">Your Profile</li>
														<li data-name="dashboard" class="drop-down__item">Your Dashboard</li>
														<li data-name="activity" class="drop-down__item">Recent activity </li>
													</ul>
													</div>
												</div>
											</div>
											</div>
											<div class="col-md-4">
											<div class="table_center">
												<div class="drop-down">
													<div id="dropDown" class="dropDown drop-down__button">
													<span class="drop-down__name">Person 2</span>
													</div>
													
													<div class="drop-down__menu-box">
													<ul class="drop-down__menu">
														<li data-name="profile" class="drop-down__item">Your Profile</li>
														<li data-name="dashboard" class="drop-down__item">Your Dashboard</li>
														<li data-name="activity" class="drop-down__item">Recent activity </li>
													</ul>
													</div>
												</div>
											</div>
											</div>
											<div class="col-md-4">
											<div class="table_center">
												<div class="drop-down">
													<div id="dropDown" class="dropDown drop-down__button">
													<span class="drop-down__name">Person 3</span>
													</div>
													
													<div class="drop-down__menu-box">
													<ul class="drop-down__menu">
														<li data-name="profile" class="drop-down__item">Your Profile</li>
														<li data-name="dashboard" class="drop-down__item">Your Dashboard</li>
														<li data-name="activity" class="drop-down__item">Recent activity </li>
													</ul>
													</div>
												</div>
											</div>
											</div>
											<div class="col-sm-4 mt-2 mb-2">
												<a class="btn btn-primary w-100 filter-btn" data-val="WingSup" href="">WingSup</a>
											</div>
											<div class="col-sm-4 mt-2 mb-2">
												<a class="btn btn-primary w-100 filter-btn" data-val="Wingfoidivng" href="">Wingfoidivng</a>
											</div>
											<div class="col-sm-4 mt-2 mb-2">
												<a class="btn btn-primary w-100 filter-btn" data-val="WingSurfing" href="">WingSurfing</a>
											</div>
											<div class="col-sm-4 mt-2 mb-2">
												<a class="btn btn-primary w-100 filter-btn" data-val="Kitesurfing" href="">Kitesurfing</a>
											</div>
											<div class="col-sm-4 mt-2 mb-2">
												<a class="btn btn-primary w-100 filter-btn" data-val="Kitefoidivng" href="">Kitefoidivng</a>
											</div>
											<div class="col-sm-4 mt-2 mb-2">
												<a class="btn btn-primary w-100 filter-btn" data-val="SnowKiteing" href="">SnowKiteing</a>
											</div>
											<div class="col-sm-4 mt-2 mb-2">
												<a class="btn btn-primary w-100 filter-btn" data-val="Windsurfing" href="">Windsurfing</a>
											</div>
											<div class="col-sm-4 mt-2 mb-2">
												<a class="btn btn-primary w-100 filter-btn" data-val="Wingfoidivng" href="">Wingfoidivng</a>
											</div>
											<div class="col-sm-4 mt-2 mb-2">
												<a class="btn btn-primary w-100 filter-btn" data-val="Sup" href="">Sup</a>
											</div>
											<div class="col-sm-4 mt-2 mb-2">
												<a class="btn btn-primary w-100 filter-btn" data-val="Yacht" href="">Yacht</a>
											</div>
											<div class="col-sm-4 mt-2 mb-2">
												<a class="btn btn-primary w-100 filter-btn" data-val="Catamaran" href="">Catamaran</a>
											</div>
											<div class="col-sm-4 mt-2 mb-2">
												<a class="btn btn-primary w-100 filter-btn" data-val="Yawl" href="">Yawl</a>
											</div >
											<div class="col-sm-4 mt-2 mb-2">
												<a class="btn btn-primary w-100 filter-btn" data-val="Surfing" href="">Surfing</a>
											</div>
											<div class="col-sm-4 mt-2 mb-2">
												<a class="btn btn-primary w-100 filter-btn" data-val="Diving" href="">Diving</a>
											</div>
											<div class="col-sm-4 mt-2 mb-2">
												<a class="btn btn-primary w-100 filter-btn reset-filter" data-val="" href="">Reset Filter</a>
											</div>
										</div>
										
											<div class="row">
												<div class="price-range-slider">
													<p class="range-value">
														<b>Duration :</b>
														<input type="text" id="amount10" readonly style="border: none;width: 85%;">
													</p>
													<div id="slider-range10" class="range-bar"></div>
												</div>

											</div>
											<div class="row">

												<div class="price-range-slider">
													<p class="range-value">
														<b>Price :</b>
														<input type="text" id="amount11" readonly style="border: none;">
													</p>
													<div id="slider-range11" class="range-bar"></div>
												</div>
											</div>
											<div class="row my-row">
												<div class="col-md-12 text-center mb-4">
													<a class="btn btn-primary w-30 lesson" href="javascript:void(0);" data-toggle="modal" data-target="#lessonandcamp">Lesson</a>
													<a class="btn btn-primary w-30 camp" href="javascript:void(0);" data-toggle="modal" data-target="#lessonandcamp">Camp</a>
													<a class="btn btn-primary w-30 rental" href="javascript:void(0);" data-toggle="modal" data-target="#rental">Rental</a>
													<a class="btn btn-primary w-30 storage" href="javascript:void(0);" data-toggle="modal" data-target="#storage">Storage</a>
													<a class="btn btn-primary w-30 courselevel mt-2" href="javascript:void(0);" data-toggle="modal" data-target="#courselevel">Course level</a>
													<a class="btn btn-primary w-30 language mt-2" href="javascript:void(0);" data-toggle="modal" data-target="#language">Language</a>
												</div>
											</div>
											<div class="row">
												<div class="price-range-slider">
													<p class="range-value">
														<b>Duration :</b>
														<input type="text" id="amount3" readonly style="border: none;width: 85%;">
													</p>
													<div id="slider-range3" class="range-bar"></div>
												</div>
															
											</div>
											<div class="row">

												<div class="price-range-slider">
													<p class="range-value">
														<b>Price :</b>
														<input type="text" id="amount" readonly style="border: none;">
													</p>
													<div id="slider-range" class="range-bar"></div>
												</div>
												<div class="price-range-slider">
													<p class="range-value">
														<b>Student Teacher ratio :</b>
														<input type="text" id="amount12" readonly style="border: none;">
													</p>
													<div id="slider-range12" class="range-bar"></div>
												</div>
												<div class="price-range-slider">
													<p class="range-value">
														<b>Price Per Hour :</b>
														<input type="text" id="amount1" readonly style="border: none;">
													</p>
													<div id="slider-range2" class="range-bar"></div>
												</div>
											</div>
											<div class="row my-row">
												<div class="col-md-12 text-center mb-4">
													<a class="btn btn-primary w-30 lesson" href="javascript:void(0);" data-toggle="modal" data-target="#Association">Association</a>
													<a class="btn btn-primary w-30 camp" href="javascript:void(0);" data-toggle="modal" data-target="#Handicap">Handicap</a>
													<a class="btn btn-primary w-30 rental" href="javascript:void(0);" data-toggle="modal" data-target="#Childern">Childern</a>
												</div>
											</div>
										
									</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		<!-- End explore-module -->
	</div>
	<!-- Banner -->
	<div class="mt-3 row">
		<div class="d-flex px-5 my-3 filter-slider">
			<span class="badge badge-success mx-1 filter-badge demo-filter d-none"></span>
		</div>
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

	@endsection
	@section('scripts')
	<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
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
		$(document).ready(()=>{

			console.clear();
			// Filter Working
			let filters = [];
			let wrapper = $(".filter-slider");
			$(".filter-btn").click(function(e) {
				e.preventDefault();
				let val = $(this).data("val");
				if($(this).hasClass("reset-filter")){
					filterReset();
				}
				else if(!val) {}
				else if($(this).hasClass("active")){
					let i = filters.findIndex(filter => filter == val);
					filtersChanged(i);
					return; 
				}
				else{
					filters.push(val);
					filtersChanged(-1);
				}
				
			});

			$(".filter-slider").on("click", ".remove-filter.cursor-pointer", function(){
				console.log($(this));
				filtersChanged($(".remove-filter.cursor-pointer").index(this));
			});

			function filtersChanged(i){
				let ele = wrapper.find(".filter-badge.d-none").clone();
				if(i < 0){
					let value = filters[filters.length-1];
					$("[data-val="+value+"]").addClass("active");
					ele.removeClass("d-none");
					ele.html(value);
					$("<i/>").addClass("fa fa-times ml-1 remove-filter cursor-pointer").appendTo(ele);
					ele.appendTo(wrapper);
				}
				else{
					let value = filters[i];
					filters.splice(i, 1);
					$("[data-val="+value+"]").removeClass("active");
					wrapper.find(".filter-badge").not(".d-none").eq(i).remove();
				}
			}
			function filterReset(){
				wrapper.find(".filter-badge").not(".d-none").remove();
				filters = [];
				$(".filter-btn.active").removeClass("active");
			}
		})

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
					<div class="accordion" id="accordionExample">
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingOne">
						<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnee" aria-expanded="true" aria-controls="collapseOnee">
						Duration
						</button>
						</h2>
						<div id="collapseOnee" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
						<div class="accordion-body">
							<div class="card">
								<div class="card-body">
									<ul class="explore__form-checkbox-list">
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">All (Default)</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">1 hour</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">2 hours</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">3 hours</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Half day</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Day</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">2 days</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">3 days</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">4 days</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">5 days</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Week</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">10 days</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">2 weeks</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">3 weeks</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingTwo">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoo" aria-expanded="false" aria-controls="collapseTwoo">
							Price per day
						</button>
						</h2>
						<div id="collapseTwoo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
						<div class="accordion-body">
							<div class="card">
								<div class="card-body">
									<div class="price-range-slider">
										<p class="range-value">
											<b>Duration :</b>
											<input type="text" id="amount9" readonly style="border: none;">
										</p>
										<div id="slider-range9" class="range-bar"></div>
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
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">1 Sets</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">2 Sets</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
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
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">All (Default)</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">1 hour</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">2 hours</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">3 hours</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Half day</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Day</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">2 days</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">3 days</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">4 days</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">5 days</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Week</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">10 days</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">2 weeks</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">3 weeks</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
						</div>
					</div>
					<div class="accordion-item">
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
					</div>
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
	<!-- rental -->
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
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">All (default)</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">IKO</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">VDWS</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
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
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">No handicap (default)</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">Blind</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">Deaf</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">Deaf/Mute</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">Waist up</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
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
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">No (default)</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">Age 5</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">Age 6</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">Age 7</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">Age 8</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">Age 9</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">Age 10</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">Age 11</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">Age 12</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">Age 13</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">Age 14</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">Age 15</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
										<span class="explore__checkbox-style"></span>
										<span class="explore__checkbox-text">Age 16</span>
									</li>
									<li>
										<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
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
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">All (default)</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Beginner</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
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