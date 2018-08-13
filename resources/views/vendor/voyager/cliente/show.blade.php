@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
           <table class="table table-hover table-responsive" id="tb-cliente">
               <thead>
                    <tr>
                        <th></th>
                        <th>Nombres</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>Dirección</th>
                        <th>Sospechoso</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $user)
                <tr>
                    <th>{{ $key + 1 }}</th>
                    <td>{{ $user->name}} {{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->cellphone }}</td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="clientes/viajes/{{ $user->id }}" class="client-detalle"><i class="fas fa-rocket"></i></a>
                        <a href="#" class="client-action @if($user->status==1) desactivado  @else activado @endif" data-estado="@if($user->status==1) 1 @else 2 @endif"><i class="fas fa-lock"></i></a>  
                        <a href="#" class="client-delete" data-id="{{ $user->id }}"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
           </table>

        </div>
    </div>
</div>
@stop