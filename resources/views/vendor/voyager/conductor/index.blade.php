@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<section class="content-header">
    <h1>Conductores</h1>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-12">

        
            <div class="table-responsive">
                <table class="table table-striped" id="tb-conductor">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>NOMBRES Y APELLIDOS</th>
                          <th>EMAIL</th>
                          <th>CELULAR</th>
                          <th>DIRECCION</th>
                          <th>Opciones</th>
                      </tr>
                  </thead>
                  <tbody>
                @foreach($users as $key => $user)
                      <tr>
                        <th>
                         {{ $key + 1 }}
                        </th>
                        <td>
                           {{ $user->name }} {{ $user->lastname }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->cellphone }}
                        </td>
                       <td></td>
                        <td>
                            <a href="/admin/conductores/detalles/{{ $user->id }}" class="user-detalle"><i class="fas fa-rocket"></i></a>
                            <a href="#" class="user-action @if($user->status==0) desactivado  @else activado @endif" data-estado="@if($user->status==0) 0 @else 1 @endif" data-id="{{ $user->id }}"><i class="fas fa-lock"></i></a>
                        </td>
                    </tr>
               @endforeach 
                  </tbody>
                </table>
              </div>
            

        </div>
    </div>
</div>



<div class="modal fade" id="estadoModal" tabindex="-1" role="dialog" aria-labelledby="estadoModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="exampleModalLabel">Estado de usuario</h4>
      </div>
      <div class="modal-body">
        <form>
          <p class="text-center">Desea cambiar el estado actual de este usuario</p>
          <div class="form-group">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <input type="hidden" name="estado" id="estado">
            <input type="hidden" name="id" id="iduser">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-conductor-estado">Modificar</button>
      </div>
    </div>
  </div>
</div
@stop