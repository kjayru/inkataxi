<?php

namespace App\Http\Controllers\Voyager;


use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Events\BreadDataAdded;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;
use App\Configuration;

class ConfiguracionController extends VoyagerBaseController
{
    public function configurar()
    {
        $configuracion = Configuration::first();
        return view('vendor.voyager.configuracion.index',['configura'=>$configuracion]);
    }

    public function configurarUpdate(Request $request, $id){
        $configura =  Configuration::find($id);

        $configura->numintentos = $request->numintentos;
        $configura->limitekm = $request->limitekm;
        $configura->tiempoespera = $request->tiempoespera;
        $configura->tiempocortesia = $request->tiempocortesia;

        $configura->horapuntainicial = $request->horapuntainicial;
        $configura->horapuntafinal = $request->horapuntafinal;
        $configura->horapuntatardeinicio = $request->horapuntatardeinicio;
        $configura->horapuntatardefinal = $request->horapuntatardefinal;

        $configura->costominuto = $request->costominuto;
        $configura->costokm = $request->costokm;
        $configura->costoaeropuerto = $request->costoaeropuerto;
        $configura->correofactura = $request->correofactura;

        $configura->correocontacto = $request->correocontacto;
        $configura->correocomunidad = $request->correocomunidad;
        $configura->conductores = $request->conductores;
        $configura->correoconductor = $request->correoconductor;

        $configura->busquedakm = $request->busquedakm;
        $configura->todos = $request->todos;
        
        $configura->save();

        return redirect('/admin/configuraciones');

    }
}
