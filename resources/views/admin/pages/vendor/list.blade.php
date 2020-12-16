@extends('admin.layout.master')
@section('title', 'Map Admin')
@section('headname','Dashboard')
@section('content')
<style type="text/css">
  .dt-buttons.btn-group {
    display: none;
    
}
#map {
    min-height: 500px;
    width: 100%;
    height:100%
}
#infoWindow {
    width: 150px;
}
</style>
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Location</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                      <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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