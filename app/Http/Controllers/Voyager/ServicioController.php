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
use App\ServiceType;

class ServicioController extends VoyagerBaseController
{
    public function tipoServicio(){

        $services = ServiceType::all();

        return view('vendor.voyager.servicios.tiposervicio',['services'=>$services]);
    }


    public function servicioPanicoTaxi()
    {
        return view('vendor.voyager.servicios.panicoTaxi');
    }

    public function servicioPanicoCliente()
    {
        return view('vendor.voyager.servicios.panicocliente');
    }
}
