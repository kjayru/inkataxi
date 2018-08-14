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
use App\Contact;

class ContactoController extends VoyagerBaseController
{
    public function mostrar(){
        $contactos = Contact::all();
        return view('vendor.voyager.contacto.index',['contactos'=>$contactos]);
    }

    public function getedit($id){
        $mensaje = Contact::find($id);

        return view('vendor.voyager.contacto.contactoeditar',['mensaje'=>$mensaje]);
    }

    public function contactoUpdate(Request $request, $id){
        $contacto = Contact::find($id);
        
        $contacto->respuesta = $request->respuesta;

        $contacto->save();

        return redirect('\admin\contacto');

        
    }
}
