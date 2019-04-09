<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    protected $table = 'activo';

    public function balance()
    {
        return $this->belongsTo('App\Balance');
    }

    public function activoCorriente()
    {
        return $this->hasOne('App\Activocorriente');
    }

    public function activoNoCorriente()
    {
        return $this->hasOne('App\Activonocorriente');
    }
}
