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
class ClienteController extends VoyagerBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inicio()
    {
        $users = User::orderby('id','desc')->where([['habilitado','<>','0'],['role_id',1]])->get();
      
         return view('vendor.voyager.cliente.show',['users'=> $users]);
        
    }

    public function viajes($id){

        $travels = Travel::where('idcliente',$id)->get();
        
      
       $conductor = User::where('id',$id)->first();
       //viajes
        $viajes = Travel::where('idcliente',$id)->count();
       //calificacion
        //$puntos = Qualification::where('user_id',$id)->sum();
        $puntos = DB::table('qualifications')
                            ->select(DB::raw('SUM(puntaje) as total'))->get();
        $pto = $puntos[0]->total;
      
                            //puntos
        $calificacion = ($viajes*100)/$puntos[0]->total; 
       

        
        return view('vendor.voyager.cliente.viajes',['travels'=>$travels,'conductor'=>$conductor,'viajes'=>$viajes,'puntos'=>$pto,'calificacion'=>$calificacion]);

    }

    public function deleteuser($id){
        $user = User::find($id);

        $user->delete();

        return response()->json(['rpta'=>'ok']);
    }



    public function viajemapa(Request $request)
    {
        
        $origlatx = $request->orig_latx;
        $origlaty = $request->orig_laty;
        $destlatx = $request->dest_latx;
        $destlaty = $request->dest_laty;

         return view('vendor.voyager.cliente.clientemapa',['origlatx'=>$origlatx,'origlaty'=>$origlaty,'destlatx'=>$destlatx,'destlaty'=>$destlaty]);
        
    }
    

    public function sendestado(Request $request, $id){
        
        $conductor = User::find($id);

        $conductor->status = $request->estado;

        $conductor->save();

        return response()->json(['rpta'=>'ok']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}
