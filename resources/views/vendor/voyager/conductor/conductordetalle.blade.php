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
                       <td>S/. {{ $costo->preciobase }} </td>
                       <td></td>
                        <td>
                            <a href="/admin/conductores/mapa/{{ $travel->id }}" class="user-detalle"><i class="fas fa-rocket"></i></a>
                            
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