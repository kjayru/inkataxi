<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN = 3;
    const CLIENTE = 1;
    const CONDUCTOR =2;
    public function users(){
        return $this->hasMany('App\Role');
    }
}
