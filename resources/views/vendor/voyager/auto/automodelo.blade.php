@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<section class="content-header">
        <h1>Modelos</h1>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <table class="table table-hover table-responsive" id="tb-modelo">
                        <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Modelo</th>
                                    <th>Marca</th>
                                    <th>Estado</th>
                                   
                                    <th>Acciones</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($modelos as $key => $modelo)
                            <tr>
                                <th>{{ $key + 1 }}</th>
                                <td>{{ $modelo->name }}</td>
                                <td>{{ $modelo->brand->name }}</td>
                                <td>@if($modelo->state==1) no activo @else activo @endif</td>
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