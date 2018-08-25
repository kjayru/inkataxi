@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<section class="content-header">
        <h1>Viaje realizado</h1>
    </section>
<div class="container">
    <div class="row">
        <div class="col-md-12">
           <table class="table table-hover table-responsive">
               <thead>
                    <tr>
                        <th></th>
                        <th>origen</th>
                        <th>Destino</th>
                        <th>Conductor</th>
                        <th>Tipo de pago</th>
                        <th>Precio</th>
                        <th>Calificación</th>
                        <th>Ver</th>
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
                              
                              
                              {{ $travel->conductor }}
                          </td>
  
                         <td>{{ $travel->paytype->nombre }}</td>
                         @php $costo = json_decode($travel->costo) @endphp
                         <td>S/. {{ round($costo->preciobase,2) }} </td>
                         <td></td>
                          <td>
                          <form action="/admin/clientes/mapa" method="post">
                          @csrf
                          <input type="hidden" name="orig_latx" value="{{ $origen->latitude }}">
                          <input type="hidden" name="orig_laty" value="{{ $origen->longitude }}">
                          <input type="hidden" name="dest_latx" value="{{ $destino->latitude }}">
                          <input type="hidden" name="dest_laty" value="{{ $destino->longitude }}">
                              <button type="submit" class="user-detalle burbujas verde"><i class="fas fa-rocket"></i></button>
                          </form>    
                          </td>
                      </tr>
                 @endforeach
               
            </tbody>
           </table>

        </div>
    </div>
</div>
@stop