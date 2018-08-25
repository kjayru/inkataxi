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
       $tipos = CarType::orderBy("id",'desc')->get();
       return view('vendor.voyager.auto.tipoauto',['tipos'=>$tipos]);
    }

    public function autoColor()
    {
        $colors = Color::orderBy("id",'desc')->get();
        return view('vendor.voyager.auto.autocolor',['colors' => $colors]);

    }

    public function autoModelo()
    {
        $modelos = Modelo::orderBy("id",'desc')->get();
        $brands = Brand::all();
        return view('vendor.voyager.auto.automodelo',['modelos'=> $modelos,'brands'=>$brands]);
    }


    public function autoMarca()
    {
        $brands = Brand::orderBy("id",'desc')->get();

        return view('vendor.voyager.auto.automarca',['brands'=>$brands]);
    }

    public function tipoAutoNew(Request $request){
         $car = new CarType;

         $car->name = $request->nombre;
         $car->comision = $request->comision;
         $car->habilitado = $request->estado;

         $car->save();

         return response()->json(['rpta'=>'ok']);
    }


    public function tipoAutoEdit($id){
        $car = CarType::find($id);
        return response()->json($car);
        
    }

    public function tipoAutoUpdate(Request $request, $id){
        $car = CarType::find($id);

        $car->name = $request->nombre;
        $car->comision = $request->comision;
        $car->habilitado = $request->estado;

        $car->save();

        return response()->json(['rpta'=>'ok']);
        
    }

    public function tipoAutoDelete($id){
        $car = CarType::find($id);
        $car->delete();

        return response()->json(['rpta'=>'ok']);
    }

    public function autoColorNew(Request $request){

        $color = new Color;

        $color->name = $request->name;
        $color->state = $request->state;

        $color->save();

        return response()->json(['rpta'=>'ok']);
    }

    public function autoColorEdit($id){

        $color = Color::find($id);
       

        return response()->json($color);
        
    }

    public function autoColorUpdate(Request $request, $id){
        $color = Color::find($id);
        $color->name = $request->name;
        $color->state = $request->state;

        $color->save();

        return response()->json(['rpta'=>'ok']);
    }

    public function autoColorDelete($id){
        $color = Color::find($id);
        $color->delete();

        return response()->json(['rpta'=>'ok']);
    }

    /*marca*/

    public function autoMarcaNew(Request $request){

        $marca = new Brand;   
        
        $marca->code = $request->code;
        $marca->name = $request->name;
        $marca->state = $request->state;
        $marca->save();
        return response()->json(['rpta'=>'ok']);
    }      

    public function autoMarcaEdit($id){
        $marca = Brand::find($id);


        return response()->json($marca);
    }     
    
    public function autoMarcaUpdate(Request $request, $id){
        $marca = Brand::find($id);
        
        $marca->code = $request->code;
        $marca->name = $request->name;
        $marca->state = $request->state;
        $marca->save();
        return response()->json(['rpta'=>'ok']);
    }

    public function autoMarcaDelete($id){
        $marca = Brand::find($id);

        $marca->delete();
        return response()->json(['rpta'=>'ok']);        
    }

    //modelo


    public function autoModeloNew(Request $request){
        
        $modelo = new Modelo;  
        $modelo->brand_id = $request->brand_id;
        $modelo->code = $request->code;
        $modelo->name = $request->name;
        $modelo->state = $request->state;
        
        $modelo->save();
        return response()->json(['rpta'=>'ok']);
    }      

    public function autoModeloEdit($id){
        $modelo = Modelo::find($id);


        return response()->json($modelo);
    }     
    
    public function autoModeloUpdate(Request $request, $id){
        $modelo = Modelo::find($id);

        $modelo->brand_id = $request->brand_id;
        $modelo->code = $request->code;
        $modelo->name = $request->name;
        $modelo->state = $request->state;

        $modelo->save();
        return response()->json(['rpta'=>'ok']);
    }

    public function autoModeloDelete($id){
        $modelo = Modelo::find($id);

        $modelo->delete();

        return response()->json(['rpta'=>'ok']);        
    }

   
}