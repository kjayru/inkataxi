@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<section class="content-header">
        <h1>Tipo de auto</h1>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <table class="table table-hover table-responsive" id="tb-tipoauto">
                        <thead>
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Comisión</th>
                                    <th>Estado</th>
                                     
                                    <th>Acciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($tipos as $key=>$tipo)
                            <tr>
                                <th>{{ $key+1 }}</th>
                                
                                
                                <td>{{ $tipo->name }}</td>
                                <td>S/ {{ $tipo->comision }}</td>
                                <td>@if($tipo->habilitado==1) activo @endif</td>
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
@stop