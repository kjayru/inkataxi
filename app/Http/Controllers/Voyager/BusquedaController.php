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
        $users = User::where('role_id',2)->with('geoposition')->get();

       

              
        
        return view('vendor.voyager.busqueda.index',['geos' => $users]);
    }

    public function inicioNew()
    {
        return view('vendor.voyager.voyager.index');
    }

    public function busqueda()
    {

        return view('vendor.voyager.busqueda.index');
    }

    public function getdatos()
    {
        $result = "";
        return response()->json(['resultado' => $result]);
    }


  public function salvar(Request $request)
  {

    dd($request);
    
    /*$contact = [];

    $contact['name'] = $request->get('name');
    $contact['email'] = $request->get('email');
    $contact['msg'] = $request->get('msg');

    // Mail delivery logic goes here
    */
    // ('Your message has been sent!')->success();
    
    //return redirect()->route('voyager.busqueda.crear');
      
      
    
    //$geos = Geoposition::all();    
    return view('vendor.voyager.busqueda.index',['geos'=>$geos]);

  }
}
