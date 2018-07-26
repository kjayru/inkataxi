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
                        <th>Nombres</th>
                        <th>Email</th>
                        <th>Celular</th>
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
                </tr>
                @endforeach
            </tbody>
           </table>

        </div>
    </div>
</div>
@stop