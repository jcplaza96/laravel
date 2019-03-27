<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasivonocorriente extends Model
{
    //
    protected $table = 'pasivonocorriente';

    public function pasivo()
    {
        return $this->belongsTo('App\Pasivo');
    }
}
