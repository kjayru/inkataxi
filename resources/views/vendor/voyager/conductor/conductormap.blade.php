@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <div id="map"></div>

        </div>
    </div>
</div>
<script>
   
 

  function initMap() {
     var directionDisplay;

  var directionsService = new google.maps.DirectionsService;
  var map;
    directionsDisplay = new google.maps.DirectionsRenderer;
    
    map = new google.maps.Map(document.getElementById("map"));
    directionsDisplay.setMap(map);

var start = new google.maps.LatLng('{{ $origlatx }}', '{{ $origlaty }}');
var end = new google.maps.LatLng('{{ $destlatx }}', '{{ $destlaty }}');
/*var start = new google.maps.LatLng('-12.0771988' , '-77.0175364');
var end = new google.maps.LatLng('-12.1361703', '-77.0212435');*/
var request = {
  origin:start, 
  destination:end,
  travelMode: google.maps.DirectionsTravelMode.DRIVING
};

    /*var start = '{{ $origlatx }}, {{ $origlaty }}';
    var end = '{{ $destlatx }}, {{ $destlaty }}';
    var request = {
      origin:start, 
      destination:end,
      travelMode: google.maps.DirectionsTravelMode.DRIVING
    };*/
    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
        var myRoute = response.routes[0];
        var txtDir = '';
        for (var i=0; i<myRoute.legs[0].steps.length; i++) {
          txtDir += myRoute.legs[0].steps[i].instructions+"<br />";
        }
        document.getElementById('directions').innerHTML = txtDir;
      }
    });
  }

    </script>
</script>
    <script async defer
      src="//maps.googleapis.com/maps/api/js?key=AIzaSyB8Z2h3V6rt4HE4zeo0dSohS1VnhRaoAyU&callback=initMap">
</script>
@stop