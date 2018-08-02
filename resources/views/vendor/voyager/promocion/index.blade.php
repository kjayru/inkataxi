@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<section class="content-header">
        <h1>Códigos de promociones</h1>
    </section>
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
                        
                        <tr>
                            <th></th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="#" class="client-servicio-edit" data-id=""><i class="fas fa-pencil-alt"></i></a>
                                <a href="#" class="client-delete" data-id=""><i class="far fa-trash-alt"></i></a> 
                            </td>
                        </tr>
                       
                    </tbody>
                </table>


        </div>
    </div>
</div>
@stop