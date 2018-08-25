@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<section class="content-header">
        <h1>Modelos</h1>
</section>
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-categories"></i> Modelo
        </h1>
            <a href="#" class="btn btn-success btn-add-modelo">
                <i class="voyager-plus"></i> <span>Añadir nuevo</span>
            </a>
            
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <table class="table table-hover table-responsive" id="tb-modelo">
                        <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Marca</th>
                                    <th>Código</th>
                                    <th>Modelo</th>
                                   
                                    <th>Estado</th>
                                   
                                    <th>Acciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($modelos as $key => $modelo)
                            <tr>
                                <th>{{ $key + 1 }}</th>
                                <td>{{ $modelo->brand->name }}</td>
                                <td>{{ $modelo->code }}</td>
                                <td>{{ $modelo->name }}</td>
                                
                                <td>@if($modelo->state==1) no activo @else activo @endif</td>
                                <td>
                                    <a href="#" class="client-modelo-edit burbuja azul" data-id="{{ $modelo->id }}"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#" class="client-delete-modelo burbuja rojo" data-id="{{ $modelo->id }}"><i class="far fa-trash-alt"></i></a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                
    
            </div>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" id="nuevo-modelo" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Nuevo tipo de auto</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" id="fr-new-modelo">
                    @csrf
                   <input type="hidden" name="method" id="metodo" value="POST">
                   <input type="hidden" name="id" id="userid" value="">

                   <div class="form-group">
                    <label class="col-md-4 control-label" for="codigo">Marca</label>  
                    <div class="col-md-6">
                    <select id="brand_id" name="brand_id"  class="form-control input-md">
                        <option >Selecciona</option>
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->code }}</option>
                        @endforeach
                    </select>
                      
                    </div>
                  </div>


                   <div class="form-group">
                    <label class="col-md-4 control-label" for="codigo">Código</label>  
                    <div class="col-md-6">
                    <input id="codigo" name="codigo" type="text" placeholder="Código" class="form-control input-md">
                      
                    </div>
                  </div>


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
                            <input type="checkbox" name="state" id="state" value="2">
                            Estado
                            </label>
    
                        </div>
                    </div>
                </form>
    
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-primary btn-save-modelo">Guardar</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop