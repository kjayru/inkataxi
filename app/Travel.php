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

    public function conductor()
    {
        return $this->belongsTo('App\User','idtaxista','id');
    }

    public function paytype(){
        return $this->hasOne('App\PayType','id','paytype_id');
    }

    public function travelstates(){
        return $this->hasMany('App\TravelState','id','travel_state_id');
    }
}
