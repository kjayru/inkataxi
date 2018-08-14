<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    public function paytypes()
    {
        return $this->hasMany('App\PayType');
    }
}
