<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    const ESTADO1 = 1;
    const ESTADO2 = 2;
    const ESTADO3 = 5;
    public function alerttypes()
    {
        return $this->hasMany('App\AlertType','id','alert_type_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
