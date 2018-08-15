<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function car(){
        return $this->belongsTo('App\Car');
    }
}
