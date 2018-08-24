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
use App\Alert;
use App\AlertType;

class ServicioController extends VoyagerBaseController
{
    public function tipoServicio(){

        $services = ServiceType::all();

        return view('vendor.voyager.servicios.tiposervicio',['services'=>$services]);
    }


    public function servicioPanicoTaxi()
    {
        $clientes = Alert::with(['user' => function($query)
        {
            $query->where('role_id', 2);       
        },'alerttypes'])->get();

        return view('vendor.voyager.servicios.panicoTaxi',['clientes'=>$clientes]);
    }

    public function servicioPanicoCliente()
    {
        $clientes = Alert::with(['user' => function($query)
        {
            $query->where('role_id', 1);       
        },'alerttypes'])->get();

        return view('vendor.voyager.servicios.panicocliente',['clientes'=>$clientes]);
    }

    public function tipoServicioNew(Request $request){
        $servicio = new ServiceType;

        $servicio->name = $request->nombre;
        $servicio->comision = $request->comision;
        $servicio->status = $request->estado;

        $servicio->save();

        return response()->json(['rpta'=>'ok']);

    }

    public function tipoServicioEdit($id){
        $servicio = ServiceType::find($id);

        return response()->json($servicio);
    }

    public function tipoServicioUpdate(Request $request, $id){
        $servicio = ServiceType::find($id);

        $servicio->name = $request->nombre;
        $servicio->comision = $request->comision;
        $servicio->status = $request->estado;

        $servicio->save();

        return response()->json(['rpta'=>'ok']);
    }

    public function tipoServicioDelete($id){
        $servicio = ServiceType::find($id);

        $servicio->delete();

        return response()->json(['rpta' => 'ok']);

    }

    //panico

    public function servicioPanicoClienteEdit($id){
        $alerta = Alert::find($id);

        $nombre = $alerta->user->name;
        $telefono = $alerta->user->phone;
        $latitud = $alerta->latitud;
        $longitud = $alerta->longitud;

        $datos = ['nombre'=>$nombre, 'telefono'=>$telefono, 'latitud'=>$latitud,'longitud'=>$longitud];
        return response()->json($datos);
    }

    public function servicioPanicoClienteUpdate(Request $request,$id){
        $alerta = Alert::find($id);

        $alerta->estado = $request->estado;
        
        $alerta->save();

        return response()->json(['rpta'=>'ok']);
    }
}
