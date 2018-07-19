@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="group">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                </div>
            </div>

            <div class="panel">
                <div class="group">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                </div>
            </div>
            <div class="panel">
                <div class="group">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                </div>
            </div>

            <div class="panel">
                <div class="group">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                </div>
            </div>

            <div class="panel">
                <div class="group">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                </div>
            </div>
            

        </div>
    </div>
</div>
@stop