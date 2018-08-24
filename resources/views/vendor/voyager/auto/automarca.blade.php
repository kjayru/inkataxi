@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<section class="content-header">
        <h1>Marcas</h1>
    </section>
    <div class="container-fluid">
            <h1 class="page-title">
                <i class="voyager-categories"></i> Marca
            </h1>
                <a href="#" class="btn btn-success btn-add-marca">
                    <i class="voyager-plus"></i> <span>Añadir nuevo</span>
                </a>
                
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <table class="table table-hover table-responsive" id="tb-marca">
                        <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                   
                                    <th>Acciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $key => $brand)
                            <tr>
                                <th> {{ $key+1 }} </th>
                                
                                
                                <td>{{ $brand->name }}</td>
                                <td>@if($brand->state==1) no activo @else activo @endif</td>
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