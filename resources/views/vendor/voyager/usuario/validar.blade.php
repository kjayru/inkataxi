@extends('voyager::master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
<section class="content-header">
    <h1>Validar usuarios</h1>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
               <div class="panel">
                     <h2>Validación Reniec</h2>
                     <div>

                     </div>
                    <form id="fr-validadni">

                        <div class="form-group">
                            <label for="dni">Dni</label>
                            <input type="dni" class="form-control" id="dni"  placeholder="DNI">
                            
                        </div>
                        
                        <button type="submit" id="validar" class="btn btn-primary">Validar</button>
                    </form>
               </div>
            
               <div class="contenido">
                    <div id="resultado"> </div>
               </div>
        </div>
    </div>
</div>
<script src="/js/reniec-sunat-js.min.js"></script>
<script>
    
	var tecactusApi = new TecactusApi("m7kAWW5ZYROvp7E2mYeHykmwHShWyb299Gb9wlhe")
	
    let valido = document.getElementById("validar");

    valido.addEventListener('click',function(e){
        e.preventDefault();
        console.log('evento...');

        tecactusApi.Reniec.getDni("41235678")
		.then(function (response) {
			console.log("consulta correcta!")
			console.log(response.data)
            document.getElementById("resultado").innerHTML= response.data;
		})
		.catch(function (response) {
			console.log("algo ocurrió")
			console.log("código de error: " + response.code)
			console.log("mensaje de respuesta: " + response.status)
			console.log(response.data)
		})
        return false;
    });

	
</script>

@stop