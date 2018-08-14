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

class CarController extends VoyagerBaseController
{
   public function tipoAuto(){
       $tipos = CarType::all();
       return view('vendor.voyager.auto.tipoauto',['tipos'=>$tipos]);
   }

   public function autoColor()
   {
        return view('vendor.voyager.auto.autocolor');

   }

   public function autoModelo()
    {
        return view('vendor.voyager.auto.automodelo');
    }
    public function autoMarca()
    {
        return view('vendor.voyager.auto.automarca');
    }
}
