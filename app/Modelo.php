<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = 'modelos';

    public function car(){
        return $this->belongsTo('App\Car');
    }

    public function brand(){
        return $this->belongsTo('App\Brand');
    }
}
