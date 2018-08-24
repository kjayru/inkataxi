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
                               
                               <a href="#" class="panico-map green" data-id="{{ $cliente->id }}"><i class="fas fa-globe"></i></a>
                               @if($cliente->estado==1)  <a href="#" class="panico-atencion blue" data-id="{{ $cliente->id }}"><i class="fas fa-check"></i></a> @endif  
                           </td>
                       </tr>
                       
                       @endif
                   @endforeach
                        </tbody>
                    </table>
                
    
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="cliente-panico" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Detalle de alerta</h4>
                </div>
                <div class="modal-body">
                        <ul class="datos">
    
                        </ul>
                        <div id="mapalerta"></div>
                </div>
                <div class="modal-footer">
                  
                  <button type="button" class="btn btn-primary btn-save-promocion">Guardar</button>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    
        <form class="form-horizontal" method="POST" id="fr-new-promo">
                @csrf
               <input type="hidden" name="method" id="metodo" value="PUT">
        </form>
    
        
              <script async defer
              src="https://maps.googleapis.com/maps/api/js?key={{ env('API_GOOGLE_MAP') }}">
              </script>
    @stop