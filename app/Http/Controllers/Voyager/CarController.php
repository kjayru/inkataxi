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
use App\CarType;
use App\Car;
use App\Color;
use App\Brand;
use App\Modelo;

class CarController extends VoyagerBaseController
{
    public function tipoAuto(){
       $tipos = CarType::all();
       return view('vendor.voyager.auto.tipoauto',['tipos'=>$tipos]);
    }

    public function autoColor()
    {
        $colors = Color::all();
        return view('vendor.voyager.auto.autocolor',['colors' => $colors]);

    }

    public function autoModelo()
    {
        $modelos = Modelo::all();
        return view('vendor.voyager.auto.automodelo',['modelos'=> $modelos]);
    }


    public function autoMarca()
    {
        $brands = Brand::all();

        return view('vendor.voyager.auto.automarca',['brands'=>$brands]);
    }
}
