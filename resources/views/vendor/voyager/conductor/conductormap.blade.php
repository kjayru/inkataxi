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
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 41.85, lng: -87.65}
        });
        directionsDisplay.setMap(map);

        
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin:  {
            lat: latitudReal,
            lng: longitudReal
            },
          destination: {
            lat: latitudReal,
            lng: longitudReal
            },
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
</script>
    <script async defer
      src="//maps.googleapis.com/maps/api/js?key=AIzaSyB941_zJGySG2jmlEscSFaiv4KtVvbx4Vg&callback=initMap">
</script>
@stop