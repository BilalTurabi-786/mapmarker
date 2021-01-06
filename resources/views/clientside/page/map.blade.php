@extends('clientside.layout.master')
@section('title', 'Map')
@section('headname','Map')
@section('content')
<style type="text/css">
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
</style>
<!-- map block
			================================================== -->
		<div class="map-wrapper">
			<div id="map" data-map-zoom="9"></div>
		</div>
		<!-- End map block -->

		<!-- explore-module
			================================================== -->
		<section class="explore">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="explore__filter">
							<form class="explore__form">
								<h2 class="explore__form-title">
									Filter Listings
								</h2>
							<div class="row">
								<div class="price-range-slider">
								  <p class="range-value">
								  	<b>Duration :</b>
								    <input type="text" id="amount3" readonly style="border: none;">
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
								  	<b>Price Per Hour :</b>
								    <input type="text" id="amount1" readonly style="border: none;">
								  </p>
								  <div id="slider-range2" class="range-bar"></div>
								</div>
							</div>
							
								<h2 class="explore__form-desc">
									Advanced Search
								</h2>
								<div class="">
									<span class="text-dark">Sports:</span>
									<ul class="explore__form-price-list">
										<li><a href="#">Football</a></li>
										<li><a href="#">Cricket</a></li>
										<li><a href="#" class="active">Hockey</a></li>
										<li><a href="#">Baseball</a></li>
										<li><a href="#">Snooker</a></li>
									</ul>
									<ul class="explore__form-checkbox-list">
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Open now</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="child-check" id="child-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Child friendly</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="near-me-check" id="near-me-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Near me</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="24-check" id="24-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">24hours</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="free-parking-check" id="free-parking-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Free Parking</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="pet-check" id="pet-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Pet Friendly</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="smooking-check" id="smooking-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Smoking allowed</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="wifi-check" id="wifi-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Wifi</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="credit-card-check" id="credit-card-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Accepts credit card</span>
										</li>
									</ul>
								</div>
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
							</form>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- End explore-module -->


@endsection
@section('scripts')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkDVoYKraeOI78AEWyax38cSnf7Gi19Lo&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <script>
      // Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.
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
        google.maps.event.addListener(map,'click',function(e) {
          location_window++;
          
          addmarker({
            coordinates: e.latLng,
            content:"<div id='location_window_"+location_window+"' class='text-center' style='width:400px!important;'> <label>Enter Name</label><input class='form-control' type='text' id='name"+location_window+"' class='form-control'  ><label>Social Links</label><table><tbody id="+location_window+"> <tr class='colname'> <td>   <label>Link</label><input type='text' class='form-control links"+location_window+"' value=''> </td><td><button><i class='fa fa-plus' class='btn btn-primary' data-id="+location_window+"></i></button></td></tr></tbody></table> <h6>Enter Location Description</h6><textarea class='form-control' id='location_description_"+location_window+"' class='form-group' rows='5' col='15'></textarea><br /><input type='button' value='Save' class='btn btn-primary save' data-id="+location_window+"  data-lat="+e.latLng.lat()+" data-lng="+e.latLng.lng()+" /></div>",
          })
          
          
             });
             function addmarker(attributes){
              var marker = new google.maps.Marker({
					position: attributes.coordinates,
					map: map,
          icon:"{{asset('app-assets/mark1.png')}}"

				});
				
				var infoWindow = new google.maps.InfoWindow({
					content: attributes.content
				});
				
				marker.addListener("click", function(){
					infoWindow.open(map, marker);
				});
             }
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
alert(langitude);
alert(latitude);

  
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
  
      </script>
      <script>
    // function  initMap(){
         
    //     }
      </script>
@endsection