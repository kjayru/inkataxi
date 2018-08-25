@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<section class="content-header">
    <h1>Tipos de servicios</h1>
</section>
<div class="container-fluid">
    <h1 class="page-title">
        <i class="voyager-categories"></i> Servicios
    </h1>
        <a href="#" class="btn btn-success btn-add-servicio-new">
            <i class="voyager-plus"></i> <span>Añadir nuevo</span>
        </a>
        
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
                <table class="table table-hover table-responsive" id="tb-tiposervicio">
                        <thead>
                             <tr>
                                 <th>#</th>
                                 <th>Nombre</th>
                                 <th>Comisión</th>
                                 <th>estado</th>
                                 <th>Acciones</th>
                             </tr>
                         </thead>
                         <tbody>
                         @foreach($services as $key => $service)
                         <tr>
                             <th>{{ $key + 1 }}</th>
                             <td>{{ $service->name }}</td>
                             <td>S/ {{ $service->comision }} </td>
                             <td>@if($service->status==2) Activo @else Desactivado @endif </td>
                             <td>
                                    <a href="#" class="client-servicio-edit burbuja azul" data-id="{{$service->id}}"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#" class="client-delete servicio-delete" data-id="{{$service->id}}"><i class="far fa-trash-alt"></i></a> 
                             </td>
                         </tr>
                         @endforeach
                     </tbody>
                    </table>

        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="nuevo-servicio" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Nuevo servicio</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="POST" id="fr-new-service">
                @csrf
               <input type="hidden" name="method" id="metodo" value="POST">
               <input type="hidden" name="id" id="userid" value="">
                <div class="form-group">
                  <label class="col-md-4 control-label" for="nombre">Nombre</label>  
                  <div class="col-md-6">
                  <input id="nombre" name="nombre" type="text" placeholder="Nombre" class="form-control input-md">
                    
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="comision">Comisión</label>  
                  <div class="col-md-6">
                  <input id="comision" name="comision" type="text" placeholder="Comisión" class="form-control input-md">
                    
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <label class="checkbox-inline" for="estado">
                        <input type="checkbox" name="estado" id="estado" value="2">
                        Estado
                        </label>

                    </div>
                </div>
                
                
                
                </form>

        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-primary btn-save-service">Guardar</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

  @stop