@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
                <table class="table table-hover table-responsive" id="tb-tiposervicio">
                        <thead>
                             <tr>
                                 <th></th>
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
                             <td>{{ $service->comision }}</td>
                             <td>{{ $service->status }}</td>
                             <td>
                                    <a href="#" class="client-servicio-edit" data-id="{{$service->id}}"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#" class="client-delete" data-id="{{$service->id}}"><i class="far fa-trash-alt"></i></a> 
                             </td>
                         </tr>
                         @endforeach
                     </tbody>
                    </table>

        </div>
    </div>
</div>
@stop