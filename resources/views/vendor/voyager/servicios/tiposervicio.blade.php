@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
                <table class="table table-hover table-responsive">
                        <thead>
                             <tr>
                                 <th></th>
                                 <th>servicio</th>
                                 <th>Comisión</th>
                                 <th>estado</th>
                                 <th></th>
                             </tr>
                         </thead>
                         <tbody>
                         @foreach($services as $key => $service)
                         <tr>
                             <th>{{ $key + 1 }}</th>
                             <td>{{ $service->name }}</td>
                             <td>{{ $service->comision }}</td>
                             <td>{{ $service->status }}</td>
                             <td></td>
                         </tr>
                         @endforeach
                     </tbody>
                    </table>

        </div>
    </div>
</div>
@stop