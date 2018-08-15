<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlertType extends Model
{
    const PENDIENTE = 1;
    const ATENDIDO = 2;
    
    public function alert(){
        return $this->belongsTo('App\Alert','alert_type_id');
    }
}
