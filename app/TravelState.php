<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelState extends Model
{
    public function travel(){
        return $this->belongsTo('App\Travel','travel_state_id');
    }
}
