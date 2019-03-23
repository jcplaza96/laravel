<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class acreedorescomerciales extends Model
{
    protected $table = 'acreedorescomerciales';

    public function proveedores()
    {
        return $this->hasMany('App\Product', 'type');
    }
}
