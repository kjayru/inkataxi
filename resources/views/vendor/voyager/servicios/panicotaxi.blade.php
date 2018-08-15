@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<section class="content-header">
        <h1>Servicio pánico Taxi</h1>
</section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <table class="table table-hover table-responsive" id="tb-panicotaxi">
                        <thead>
                                <tr>
                                    
                                    <th>Código de servicio</th>
                                    <th>Cliente</th>
                                    <th>Estado</th>
                                    
                                    <th>Acciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($clientes as $key => $cliente)
                       
                       @if($cliente->user['name']!='')
                       <tr>
                          
                           
                           <td>{{ $cliente->alerttypes[0]->name }}</td>
                           <td>{{ $cliente->user['name'] }}</td>
                           <td>@if($cliente->estado==1) pendiente @else atendido @endif </td>
                           <td>
                               
                               <a href="#" class="panico-map green" data-id=""><i class="fas fa-globe"></i></a>
                               @if($cliente->estado==1)  <a href="#" class="panico-atencion blue" data-id=""><i class="fas fa-check"></i></a> @endif  
                           </td>
                       </tr>
                       
                       @endif
                   @endforeach
                        </tbody>
                    </table>
                
    
            </div>
        </div>
    </div>
    @stop