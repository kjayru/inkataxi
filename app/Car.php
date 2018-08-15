<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function cartypes(){
        return $this->hasMany('App\CarType');
    }

    public function brands(){
        return $this->hasMany('App\Brand');
    }

    public function colors(){
        return $this->hasMany('App\Color');
    }

    public function modelos(){
        return $this->hasMany('App\Modelo');
    }
}
