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
        return $this->hasOne('App\Pasivo');
    }

    public function pasivoNoCorriente()
    {
        return $this->hasOne('App\Pasivo');
    }
}
