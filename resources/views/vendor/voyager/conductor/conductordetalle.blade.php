@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<section class="content-header">
    <h1>Viajes Conductores</h1>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="datos">
            <ul class="datosuser">
                <li>Datos Conductor:</li>
                <li>
                    <dl>
                        
                            <dd>{{ $conductor->name}} {{ $conductor->apellidos}}</dd>
                        
                            <dd>viajes: <span>{{ $viajes }}</span> Calificacion: <span class="calficacion">{{ $calificacion }}</span> Puntos: <span>{{ $puntos }}</span>  </dd>
                        
                            <dd>Rango: Caballero</dd>
                    </dl>  
                </li>
            </ul>
        </div>

            <div class="table-responsive">
                <table class="table table-striped" id="tb-conductor">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>ORIGEN</th>
                          <th>DESTINO</th>
                          <th>CLIENTE</th>
                          <th>TIPO DE PAGO</th>
                          <th>PRECIO</th>
                          <th>CALIFICACION</th>
                          <th>VER</th>
                      </tr>
                  </thead>
                  <tbody>
                @foreach($travels as $key => $travel)
                      <tr>
                        <th>
                         {{ $key + 1 }}
                        </th>
                        <td>
                            
                           @php $origen = json_decode($travel->origen) @endphp
                           {{ utf8_decode($origen->direccion) }}
                        </td>
                        <td>
                            @php $destino = json_decode($travel->destino) @endphp
                            {{ utf8_decode($destino->direccion) }}
                        </td>
                        <td>
                            
                            
                            {{ $travel->cliente->name }} {{ $travel->cliente->lastname }}
                        </td>

                       <td>{{ $travel->paytype->nombre }}</td>
                       @php $costo = json_decode($travel->costo) @endphp
                       <td>S/. {{ round($costo->preciobase,2) }} </td>
                       <td></td>
                        <td>
                        <form action="/admin/conductores/mapa" method="post">
                        @csrf
                        <input type="hidden" name="orig_latx" value="{{ $origen->latitude }}">
                        <input type="hidden" name="orig_laty" value="{{ $origen->longitude }}">
                        <input type="hidden" name="dest_latx" value="{{ $destino->latitude }}">
                        <input type="hidden" name="dest_laty" value="{{ $destino->longitude }}">
                            <button type="submit" class="user-detalle"><i class="fas fa-rocket"></i></button>
                        </form>    
                        </td>
                    </tr>
               @endforeach 
                  </tbody>
                </table>
              </div>
            

        </div>
    </div>
</div>
@stop