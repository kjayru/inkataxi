@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<section class="content-header">
    <h1>Contactos</h1>
</section>
<div class="container">
    <div class="row">
        
            <table class="table table-hover table-responsive">
                    <thead>
                            <tr>
                                <th></th>
                                <th>Contacto</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>
                               
                                
                            </tr>
                        </thead>
                        <tbody>
                        
                        <tr>
                            <th></th>
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