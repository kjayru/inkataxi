@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<section class="content-header">
        <h1>Códigos de promociones</h1>
</section>
<div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-categories"></i> Promociones
        </h1>
            <a href="#" class="btn btn-success btn-add-promocion" id="btn-promocion">
                <i class="voyager-plus"></i> <span>Añadir nuevo</span>
            </a>
            
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
                <table class="table table-hover table-responsive" id="tb-promocion">
                    <thead>
                            <tr>
                                <th></th>
                                <th>Código de promoción</th>
                                <th>Desde</th>
                                <th>Hasta</th>
                                <th>Tipo</th>
                                <th>Descuento</th>
                                <th>Limite</th>
                                <th>Acciones</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($promos as $key => $promo)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ $promo->code }}</td>
                            <td>{{ $promo->desde}}</td>
                            <td>{{ $promo->hasta}}</td>
                            <td>{{ $promo->promotiontypes[0]->name}}</td>
                            <td>{{ $promo->montodescuento}}</td>
                            <td>{{ $promo->limite}}</td>
                            <td>
                                <a href="#" class="client-promo-edit" data-id="{{ $promo->id }}"><i class="fas fa-pencil-alt"></i></a>
                                <a href="#" class="client-delete-promo" data-id="{{ $promo->id }}"><i class="far fa-trash-alt"></i></a> 
                            </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>


        </div>
    </div>
</div>



<div class="modal fade" tabindex="-1" id="nuevo-promocion" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Nuevo promoción</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" id="fr-new-promo">
                    @csrf
                   <input type="hidden" name="method" id="metodo" value="POST">
                   <input type="hidden" name="id" id="userid" value="">
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="code">Código Promoción</label>  
                      <div class="col-md-6">
                      <input id="code" name="code" type="text" placeholder="Codigo promoción" class="form-control input-md">
                        
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="desde">Vigencia desde:</label>  
                      <div class="col-md-6">
                      <input id="desde" name="desde" type="date" placeholder="desde" class="form-control input-md">
                        
                      </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label" for="hasta">Vigencia hasta:</label>  
                        <div class="col-md-6">
                            <input id="hasta" name="hasta" type="date" placeholder="Hasta" class="form-control input-md">  
                        </div>
                    </div>

                    <div class="form-group">
                            <label class="col-md-4 control-label" for="promotipo">Tipo:</label>  
                            <div class="col-md-6">
                                <select id="promotipo" name="promotion_type_id"  class="form-control input-md"> 
                                  <option>Seleccione</option>
                                    @foreach($tipos as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->name }} </option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="monto">Monto:</label>  
                        <div class="col-md-6">
                            <input id="montodescuento" name="montodescuento" type="text" placeholder="Monto" class="form-control input-md">  
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="limite">Limite:</label>  
                        <div class="col-md-6">
                            <input id="limite" name="limite" type="text" placeholder="Limite" class="form-control input-md">  
                        </div>
                    </div>
                    
                </form>
    
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-primary btn-save-promocion">Guardar</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@stop