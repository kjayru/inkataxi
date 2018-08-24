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
use App\User;

class NotificacionController extends VoyagerBaseController
{
   public function mostrar(){                                                                                                                                                                                                                                                                                                                                                  
       $users = User::all();
       return view('vendor.voyager.notificacion.index',['users' => $users]);
   }


   public function mostrarNew(Request $request){

    $marca = new Modelo;                          
    return response()->json(['rpta'=>'ok']);
    }      

    public function mostrarEdit($id){
        $marca = Modelo::find($id);


        return response()->json($marca);
    }     

    public function mostrarUpdate(Request $request){
        $marca = Modelo::find($id);


        return response()->json(['rpta'=>'ok']);
    }

    public function mostrarDelete($id){
        $marca = Modelo::find($id);

        $marca->delete();
        return response()->json(['rpta'=>'ok']);        
    }



}