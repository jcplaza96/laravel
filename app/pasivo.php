<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasivo extends Model
{
    //
    protected $table = 'pasivo';

    public function balance()
    {
        return $this->belongsTo('App\Balance');
    }

    public function pasivoCorriente()
    {
        return $this->hasOne('App\Pasivocorriente');
    }

    public function pasivoNoCorriente()
    {
        return $this->hasOne('App\Pasivonocorriente');
    }

    public function patrimonioNeto()
    {
        return $this->hasOne('App\Patrimonioneto');
    }
}
