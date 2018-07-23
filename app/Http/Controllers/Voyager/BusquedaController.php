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
use App\Geoposition;
use App\User;

class BusquedaController extends VoyagerBaseController
{
    public function inicio()
    {
        $geos = Geoposition::all();
        return view('vendor.voyager.busqueda.index',['geos' => $geos]);
    }

    public function inicioNew()
    {
        return view('vendor.voyager.busqueda.index');
    }

    public function busqueda()
    {
        return view('vendor.voyager.busqueda.index');
    }

    public function getdatos()
    {
        return view('vendor.voyager.busqueda.index');
    }
}
