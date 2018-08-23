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
use App\PayType;
class PagoController extends VoyagerBaseController
{
    public function tipoPago()
    {
        $paytypes = PayType::all();

        return view('vendor.voyager.pagos.tipospago',['paytypes'=>$paytypes]);
    }


    public function tipoPagoNew(Request $request){
        $pago = new PayType;

        $pago->nombre = $request->nombre;

        $pago->save();

        return response()->json(['rpta'=>'ok']);
    }

    public function tipoPagoEdit($id){
        $pago = PayType::find($id);

        return response()->json($pago);
    }

    public function tipoPagoUpdate(Request $request, $id){
        $pago = PayType::find($id);
        $pago->nombre =  $request->nombre;

        $pago->save();
        return response()->json(['rpta'=>'ok']);
    }

    public function tipoPagoDelete($id){
        $pago = PayType::find($id);

        $pago->delete();
        return response()->json(['rpta'=>'ok']);

    }



}
