<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function car(){
        return $this->belongsTo('App\Car');
    }

    public function modelos(){
        return $this->hasMany('App\Modelo');
    }
}
