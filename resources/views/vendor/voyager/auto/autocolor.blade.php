@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<section class="content-header">
        <h1>Colores</h1>
    </section>
    <div class="container-fluid">
            <h1 class="page-title">
                <i class="voyager-categories"></i> Color
            </h1>
                <a href="#" class="btn btn-success btn-add-color">
                    <i class="voyager-plus"></i> <span>Añadir nuevo</span>
                </a>
                
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <table class="table table-hover table-responsive" id="tb-color">
                        <thead>
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                   
                                    <th>Acciones</th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($colors as $key => $color)
                            <tr>
                                <th>{{ $key + 1 }}</th>
                                
                                
                                <td>{{ $color->name }}</td>
                                <td>@if($color->state==1) no activo @else activo @endif</td>
                                <td>
                                    <a href="#" class="client-servicio-edit" data-id=""><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#" class="client-delete" data-id=""><i class="far fa-trash-alt"></i></a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                
    
            </div>
        </div>
    </div>



    <div class="modal fade" tabindex="-1" id="nuevo-color" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Nuevo tipo de auto</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" id="fr-new-color">
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
                  
                  <button type="button" class="btn btn-primary btn-save-auto">Guardar</button>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
@stop