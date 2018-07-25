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
                                              <input type="checkbox" name="disponibilidad" id="disponibilidad" value="1" onclick="disponible()">Disponible <span>51</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label for="enservicio">
                                                <input type="checkbox" name="enservicio" id="enservicio" value="1" onclick="servicio()">En servicio <span>331</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <label for="fueraservicio">
                                                <input type="checkbox" name="fueraservicio" id="fueraservicio" value="1" onclick="fuera()">Fuera de Servicio <span>0</span>
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


<script>
function disponible(){
    var dispo = document.getElementById('disponibilidad');
   
   if(dispo.checked==true){
    initMap('disponibilidad');
   }else{
    initMap();
   }
}

function servicio(){
    var dispo2 = document.getElementById('enservicio');
   
   if(dispo2.checked==true){
    initMap('enservicio');
   }else{
    initMap();
   }
}

function fuera(){
    var dispo3 = document.getElementById('fueraservicio');
   
   if(dispo3.checked==true){
    initMap('fueraservicio');
   }else{
    initMap(); 
   }
}


function initMap(tipo){
    var iconBase = 'https://maps.google.com/mapfiles/kml/paddle/';
    var locations 

    switch (tipo) {
        case 'disponibilidad':
             locations = [
                @foreach($geos as $geo)
                    @if($geo->geoposition['latitude'])
                      @if(@$geo->status==1)
                        [ '{{$geo->name}}',{{ $geo->geoposition['latitude'] }} ,{{ $geo->geoposition['longitude'] }}, 4,'grn-circle.png'],
                      @endif
                    @endif
                @endforeach
            ];
        break;
        case 'enservicio':
             locations = [
                    @foreach($geos as $geo)
                        @if($geo->geoposition['latitude'])
                          @if(@$geo->status==2)
                            [ '{{$geo->name}}',{{ $geo->geoposition['latitude'] }} ,{{ $geo->geoposition['longitude'] }}, 4,'ylw-blank.png'],
                           @endif
                        @endif
                    @endforeach
                ];
        break;
        case 'fueraservicio':
             locations = [
                    @foreach($geos as $geo)
                        @if($geo->geoposition['latitude'])
                          @if(@$geo->status==0)
                            [ '{{$geo->name}}',{{ $geo->geoposition['latitude'] }} ,{{ $geo->geoposition['longitude'] }}, 4,'red-circle.png'],
                            @endif
                        @endif
                    @endforeach
                ];
        break;
    
        default:
         locations = [
                @foreach($geos as $geo)
                    @if($geo->geoposition['latitude'])
                        [ '{{$geo->name}}',{{ $geo->geoposition['latitude'] }} ,{{ $geo->geoposition['longitude'] }}, 4,  @if(@$geo->status==2)  'ylw-blank.png' @elseif(@$geo->status==1)  'grn-circle.png' @else  'red-circle.png' @endif
                        ],
                    @endif
                @endforeach
            ];
        break;
    }
        

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
        map: map,
        icon:iconBase+locations[i][4]
    });
        
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