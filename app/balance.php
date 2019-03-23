<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    //
    protected $table = 'balance';

    public function activo()
    {
        return $this->hasOne('App\Activo');
    }

    public function pasivo()
    {
        return $this->hasOne('App\Pasivo');
    }

    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }

}
