@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<section class="content-header">
        <h1>Atender contacto</h1>
</section>
<div class="container">
    <div class="row">
        <div class="panel-block">
            <div class="col-md-12">
                <div class="bloque">
                    <p>Nombre y Apellidos:<span>{{ $mensaje->name }}</span></p>
                    <p>Correo: <span>{{ $mensaje->email }}</span></p>
                    <p>Telefono: <span>{{ $mensaje->phone }}</span></p>
                    
                </div>
            </div>
            <div class="col-md-12">
                <form action="/admin/contacto/{{ $mensaje->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="pregunta">Pregunta</label>
                        <textarea  name="pregunta" class="form-control" >{{ $mensaje->pregunta }}</textarea>
                    </div>
                             
                    <div class="form-group">
                        <label for="respuesta">Respuesta</label>
                        <textarea name="respuesta" class="form-control"  placeholder="Respuesta">{{ @$mensaje->respuesta }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop