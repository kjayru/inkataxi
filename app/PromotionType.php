<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromotionType extends Model
{
    public function promotion()
    {
        return $this->belongsTo('App\Promotion','id');
    }
}
