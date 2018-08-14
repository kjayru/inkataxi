<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function cartypes(){
        return $this->hasMany('App\CarType');
    }
}
