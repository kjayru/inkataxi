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
use App\Travel;

class ConductorController extends VoyagerBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inicio()
    {
      
        $users = User::where('role_id',2)->get();
        return view('vendor.voyager.conductor.index',['users'=>$users]);
        
    }

    public function inicioEdit($id)
    {
        $travels = Travel::where('idtaxista',$id)->get();
        
       // dd($travels);

        return view('vendor.voyager.conductor.conductordetalle',['travels'=>$travels]);
        
    }

    public function estado(Request $request)
    {
      
         return view('vendor.voyager.conductor.asignacion');
        
    }

    public function viajemapa(Request $request)
    {
      
         return view('vendor.voyager.conductor.asignacion');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}
