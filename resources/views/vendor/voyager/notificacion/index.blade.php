@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-block">
                <div class="group">
                    <label>Mensaje de notificación</label>
                    <textarea name="mensaje" class="form-control" placeholder="Mensaje de notificación"></textarea>
                </div>
                <div>
                    enviar a:
                </div>
                <div class="group">
                <select class="selectpicker" id="selnotifica" multiple>
                <option value="create">Seleccione</option>
  
                        @foreach($users as $user)
                            <option  >{{ $user->name }} {{ $user->lastname }}</option>
                        @endforeach
                      </select>
                </div>
            </div>

            
            

        </div>
    </div>
</div>

@stop