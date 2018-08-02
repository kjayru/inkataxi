<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function cliente(){
        return $this->belongsTo('App\User','idcliente','id');
    }

    public function paytype(){
        return $this->hasOne('App\PayType','id','paytype_id');
    }
}
