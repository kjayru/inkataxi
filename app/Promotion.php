<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public function promotiontypes()
    {
        return $this->hasMany('App\PromotionType','id');
    }
}
