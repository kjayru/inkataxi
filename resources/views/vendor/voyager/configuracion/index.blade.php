@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="col-md-6">
                    
                           
                        <div class="group">
                                <label for="">Número de intentos</label>
                            <input type="text" name="intentos" class="form-control" value="{{ @$configura->numintentos }}" placeholder="Número de intentos">
                        </div>
                
                        <div class="group">
                            <label for="">Tiempo de espera (minutos)</label>
                            <input type="text" name="tiempoespera" class="form-control" value="{{ @$configura->tiempoespera }}" placeholder="tiempo de espera">
                        </div>

                        <div class="group">
                            <label for="">Hora Punta (mañana)</label>
                            <input type="text" name="horapuntamaninicio" class="form-control" value="{{ @$configura->horapuntainicial }}" placeholder="hora punta">
                        </div>

                        <div class="group">
                            <label for="">Hora Punta (tarde)</label>
                            <input type="text" name="horapuntardeinicio" class="form-control" placeholder="hora punta">
                        </div>


                        <div class="group">
                            <label for="">Costo por Minuto (S/)</label>
                            <input type="text" name="costominuto" class="form-control" value="{{ @$configura->costokm }}" placeholder="Costo por minuto">
                        </div>

                        <div class="group">
                            <label for="">Correo emisión factura</label>
                            <input type="text" name="correoemision" class="form-control" placeholder="Correo emisión factura">
                        </div>

                        <div class="group">
                            <label for="">Correo emisión comunidad</label>
                            <input type="text" name="correocomunidad" class="form-control" placeholder="Correo emisión comunidad">
                        </div>

                        <div class="group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="todos" value="">
                                        Todos
                                    </label>
                                </div>

                        </div>

                        <div class="group">
                            <label for="">Conductores</label>
                            <input type="text" name="conductores" placeholder="Conductores">
                        </div>

                        <div class="group">
                            <label for="">Busqueda KM</label>
                            <input type="text" name="busquedakm" placeholder="Busqueda KM">
                        </div>
                
                </div>

                <div class="col-md-6">
                    
                        <div class="group">
                            <label for="">Límite kilometro normal</label>
                            <input type="text" name="lkn" class="form-control" value="{{ @$configura->limitekm }}" placeholder="Límite kilometro normal">
                        </div>
                

                       <div class="group">
                            <label for="">Tiempo de cortesia (Min)</label>
                            <input type="text" name="tiempocortesia" class="form-control" value="{{ @$configura->tiempocortesia }}" placeholder="Tiempo de cortesia">
                        </div>

                        <div class="group">
                            <label for="">Hora punta final (Mañana)</label>
                            <input type="text" name="horapuntamanfinal" class="form-control" placeholder="Hora punta final">
                        </div>

                        <div class="group">
                            <label for="">Hora punta final (Tarde)</label>
                            <input type="text" name="horapuntardefinal" class="form-control" placeholder="Hora punta final">
                        </div>

                        <div class="group">
                            <label for="">Costo a Aeropuerto (S/)</label>
                            <input type="text" name="costoaeropuerto" class="form-control" placeholder="Costo a Aeropuerto">
                        </div>

                        <div class="group">

                            <label for="">Correo para contacto</label>
                            <input type="text" name="correocontacto" class="form-control" placeholder="Correo para contacto">
                        </div>

                        <div class="group">

                            <label for="">Correo para conductores</label>
                            <input type="text" name="correoconductores" class="form-control" placeholder="Correo para conductores">
                        </div>
                
                </div>

               
            </div>
            <div class="col-md-12 text-center">
                    <input type="button" class="btn btn-success" value="Guardad">
            </div>
        </div>
    </div>
</div>
@stop