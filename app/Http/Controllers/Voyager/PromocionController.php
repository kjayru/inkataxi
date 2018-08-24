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
use App\Promotion;
use App\PromotionType;
class PromocionController extends VoyagerBaseController
{
    public function mostrar(){
        $promos = Promotion::all();
        $tipos = PromotionType::all();
        return view('vendor.voyager.promocion.index',['promos'=>$promos,'tipos'=>$tipos]);
    }

    public function mostrarNew(Request $request){
        
        $promo = new Promotion;

        $promo->code = $request->code;
        $promo->desde= $request->desde;
        $promo->hasta = $request->hasta;
        $promo->montodescuento = $request->montodescuento;
        $promo->limite= $request->limite;
        $promo->promotion_type_id = $request->promotipo;

        $promo->save();

        return response()->json(['rpta'=>'ok']);
    }

    public function mostrarNEdit($id){
        $promo = Promotion::find($id);

        return response()->json($promo);
    }

    public function mostrarUpdate(Request $request, $id){
        $promo = Promotion::find($id);

        $promo->code = $request->code;
        $promo->desde= $request->desde;
        $promo->hasta = $request->hasta;
        $promo->montodescuento = $request->montodescuento;
        $promo->limite= $request->limite;
        $promo->promotion_type_id = $request->promotipo;

        $promo->save();

        return response()->json(['rpta'=>'ok']);
    }

    public function mostrarDelete($id){
        $promo = Promotion::find($id);
        $promo->delete();

        return response()->json(['rpta'=>'ok']);
    }
}
/*configurarNew
configurarEdit
configurarUpdate
configurarDelete*/

