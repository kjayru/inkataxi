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
                            <a href="#" class="user-action @if($user->status==1) desactivado  @else activado @endif" data-estado="@if($user->status==1) 1 @else 2 @endif"><i class="fas fa-lock"></i></a>
                        </td>
                    </tr>
               @endforeach 
                  </tbody>
                </table>
              </div>
            

        </div>
    </div>
</div>
@stop