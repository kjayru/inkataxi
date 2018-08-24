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

        $color->nombre = $request->nombre;
        $color->estado = $request->estado;

        $color->save();

        return response()->json(['rpta'=>'ok']);
    }

    public function autoColorEdit($id){

        $color = Color::find($id);
       

        return response()->json($color);
        
    }

    public function autoColorUpdate(Request $request, $id){
        $color = Color::find($id);
        $color->nombre = $request->nombre;
        $color->estado = $request->estado;

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
        return response()->json(['rpta'=>'ok']);
    }      

    public function autoMarcaEdit($id){
        $marca = Brand::find($id);


        return response()->json($marca);
    }     
    
    public function autoMarcaUpdate(Request $request){
        $marca = Brand::find($id);

        return response()->json(['rpta'=>'ok']);
    }

    public function autoMarcaDelete($id){
        $marca = Brand::find($id);

        $marca->delete();
        return response()->json(['rpta'=>'ok']);        
    }

    //modelo


    public function autoModeloNew(Request $request){

        $marca = new Modelo;                          
        return response()->json(['rpta'=>'ok']);
    }      

    public function autoModeloEdit($id){
        $marca = Modelo::find($id);


        return response()->json($marca);
    }     
    
    public function autoModeloUpdate(Request $request){
        $marca = Modelo::find($id);


        return response()->json(['rpta'=>'ok']);
    }

    public function autoModeloDelete($id){
        $marca = Modelo::find($id);

        $marca->delete();
        return response()->json(['rpta'=>'ok']);        
    }

   
}