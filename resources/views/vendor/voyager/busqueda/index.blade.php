@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
@include('flash::message')

<section class="content-header">
        <h1>Busqueda de conductores</h1>
    </section>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="opciones">
                      
                    <form action="{{url('admin/busqueda')}}" id="fr-buscar" method="post">
                        @csrf
                        <div class="col-md-4">
                           
                                <div class="form-group">
                                    <label for="buscarconductor">Campo a buscar</label>
                                    <input type="text" name="conductor" class="form-control" id="buscarconductor" placeholder="Ingrese campo a buscar">
                                </div>
                            
                        </div>
                        <div class="col-md-2">
                                <ul>
                                    <li>
                                        <div class="checkbox">
                                            <label for="disponibilidad">
                                              <input type="checkbox" name="disponibilidad" id="disponibilidad" value="1">Disponible <span>51</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label for="enservicio">
                                                <input type="checkbox" name="enservicio" id="enservicio" value="1">Disponible <span>331</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label for="fueraservicio">
                                                <input type="checkbox" name="fueraservicio" id="fueraservicio" value="1">Disponible <span>0</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <button class="btn btn-primary buscarconductor center-block">Buscar Conductor</button>
                            </div>
                        </div>
                    </form>

                    </div>
                </div>

            </div>
            

            <div class="box">
                <div class="box-body">
                    <div class="mapa" id="imap">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 0 sin servicio, 1 esperando, 2 en servicio -->
@foreach($geos as $geo)
{{ $geo->status }}

@endforeach

<script>
function initMap(){
   /* var locations = [
   
    ];*/


     var map = new google.maps.Map(document.getElementById('imap'), {
      zoom: 11,
      center: new google.maps.LatLng(-12.1021498, -77.0364146),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

var marker, i;

    for (i = 0; i < locations.length; i++) {  
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
    });


var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
        var icons = {
          parking: {
            icon: iconBase + 'icon_red.png'
          },
          enespera: {
            icon: iconBase + 'icon_yellow.png'
          },
          enservicio: {
            icon: iconBase + 'icon_green.png'
          }
        };

        var features = [
          {
            position: new google.maps.LatLng(-33.91721, 151.22630),
            type: 'info'
          }, 
        ];


    google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
        infowindow.setContent(locations[i][0]);
        infowindow.open(map, marker);
        }
    })(marker, i));
    }
}
</script>
    <script async defer
      src="//maps.googleapis.com/maps/api/js?key=AIzaSyB941_zJGySG2jmlEscSFaiv4KtVvbx4Vg&callback=initMap">
</script>
@stop