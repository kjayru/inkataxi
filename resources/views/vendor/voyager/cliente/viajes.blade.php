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
                        <th>origen</th>
                        <th>Destino</th>
                        <th>Conductor</th>
                        <th>Tipo de pago</th>
                        <th>Precio</th>
                        <th>Calificación</th>
                        <th>Ver</th>
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
                    <td></td>
                    
                </tr>
               
            </tbody>
           </table>

        </div>
    </div>
</div>
@stop