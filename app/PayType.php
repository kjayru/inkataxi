<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayType extends Model
{
    public function travel(){
        return $this->belongsTo('App\Travel');
    }
}
