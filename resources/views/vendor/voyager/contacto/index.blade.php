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
        
            <table class="table table-hover table-responsive" id="tb-contacto">
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
                        @foreach($contactos as $key => $contacto)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ $contacto->name }}</td>
                            <td>{{ $contacto->email }}</td>
                            <td>{{ $contacto->phone }}</td>
                            
                            <td>
                                <a href="/admin/contacto/{{ $contacto->id }}/edit" class="contact-event green"><i class="far fa-comment-dots"></i></a>
                                
                            </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            

        </div>
    </div>
</div>
@stop