@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="group">
                    <label>Mensaje de notificación</label>
                    <textarea name="mensaje" class="form-control" placeholder="Mensaje de notificación"></textarea>
                </div>
                <div>
                    enviar a:
                </div>
                <div class="group">
                <select class="selectpicker" data-show-subtext="true" data-live-search="true">
                        <option data-subtext="Rep California">Tom Foolery</option>
                        <option data-subtext="Sen California">Bill Gordon</option>
                        <option data-subtext="Sen Massacusetts">Elizabeth Warren</option>
                        <option data-subtext="Rep Alabama">Mario Flores</option>
                        <option data-subtext="Rep Alaska">Don Young</option>
                        <option data-subtext="Rep California" disabled="disabled">Marvin Martinez</option>
                      </select>
                </div>
            </div>

            
            

        </div>
    </div>
</div>

@stop