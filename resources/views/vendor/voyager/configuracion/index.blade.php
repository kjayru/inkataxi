@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<section class="content-header">
    <h1>Configuraciones globales</h1>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-12 panel-block">
            <div class="panel">
                    <form action="/admin/configuraciones/{{ $configura->id }}" method="POST"> 
                <div class="col-md-6">
                    
                    
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        
                        <div class="group">
                                <label for="">Número de intentos</label>
                            <input type="text" name="numintentos" class="form-control" value="{{ @$configura->numintentos }}" placeholder="Número de intentos">
                        </div>
                
                        <div class="group">
                            <label for="">Tiempo de espera (minutos)</label>
                            <input type="text" name="tiempoespera" class="form-control" value="{{ @$configura->tiempoespera }}" placeholder="tiempo de espera">
                        </div>

                        <div class="group">
                            <label for="">Hora Punta (mañana)</label>
                            <input type="text" name="horapuntainicial" class="form-control" value="{{ @$configura->horapuntainicial }}" placeholder="hora punta">
                        </div>

                        <div class="group">
                            <label for="">Hora Punta (tarde)</label>
                            <input type="text" name="horapuntatardeinicio" class="form-control" value="{{ @$configura->horapuntatardeinicio}}" placeholder="hora punta">
                        </div>


                        <div class="group">
                            <label for="">Costo por Minuto (S/)</label>
                            <input type="text" name="costominuto" class="form-control" value="{{ @$configura->costominuto }}" placeholder="Costo por minuto">
                        </div>

                        <div class="group">
                            <label for="">Costo por KM (S/)</label>
                            <input type="text" name="costokm" class="form-control" value="{{ @$configura->costokm }}" placeholder="Costo por minuto">
                        </div>

                        <div class="group">
                            <label for="">Correo emisión factura</label>
                            <input type="text" name="correofactura" class="form-control" value="{{ @$configura->correofactura }}" placeholder="Correo emisión factura">
                        </div>

                        <div class="group">
                            <label for="">Correo emisión comunidad</label>
                            <input type="text" name="correocomunidad" class="form-control" value="{{ @$configura->correocomunidad }}" placeholder="Correo emisión comunidad">
                        </div>

                        <div class="group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="todos" id="todos" value="2" @if($configura->todos==2) checked @endif>
                                        Todos
                                    </label>
                                </div>

                        </div>

                        <div class="group atodos" @if($configura->todos==2) style="display:none" @endif>
                            <label for="">Conductores</label>
                            <input type="number" name="conductores" value="{{ @$configura->conductores }}" class="form-control"  placeholder="Conductores">
                        </div>

                        <div class="group atodos" @if($configura->todos==2) style="display:none" @endif>
                            <label for="">Busqueda KM</label>
                            <input type="text" name="busquedakm" value="{{ @$configura->busquedakm }}" class="form-control" placeholder="Busqueda KM">
                        </div>
                
                </div>

                <div class="col-md-6">
                    
                        <div class="group">
                            <label for="">Límite kilometro normal</label>
                            <input type="text" name="limitekm" class="form-control" value="{{ @$configura->limitekm }}" placeholder="Límite kilometro normal">
                        </div>
                

                       <div class="group">
                            <label for="">Tiempo de cortesia (Min)</label>
                            <input type="text" name="tiempocortesia" class="form-control" value="{{ @$configura->tiempocortesia }}" placeholder="Tiempo de cortesia">
                        </div>

                        <div class="group">
                            <label for="">Hora punta final (Mañana)</label>
                            <input type="text" name="horapuntafinal" class="form-control" value="{{ @$configura->horapuntafinal }}" placeholder="Hora punta final">
                        </div>

                        <div class="group">
                            <label for="">Hora punta final (Tarde)</label>
                            <input type="text" name="horapuntatardefinal" class="form-control" value="{{ @$configura->horapuntatardefinal }}" placeholder="Hora punta final">
                        </div>

                        <div class="group">
                            <label for="">Costo a Aeropuerto (S/)</label>
                            <input type="text" name="costoaeropuerto" class="form-control" value="{{ @$configura->costoaeropuerto }}" placeholder="Costo a Aeropuerto">
                        </div>

                        <div class="group">

                            <label for="">Correo para contacto</label>
                            <input type="text" name="correocontacto" class="form-control" value="{{ @$configura->correocontacto }}" placeholder="Correo para contacto">
                        </div>

                        <div class="group">

                            <label for="">Correo para conductores</label>
                            <input type="text" name="correoconductor" class="form-control" value="{{ @$configura->correoconductor }}" placeholder="Correo para conductores">
                        </div>
                
                </div>

               
            </div>
            <div class="col-md-12 text-center">
                    <input type="submit" class="btn btn-success" value="Guardad">
            </div>
        </form>  
        </div>
    </div>
</div>
@stop