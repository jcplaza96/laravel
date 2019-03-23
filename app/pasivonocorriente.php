<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pasivonocorriente extends Model
{
    //
    protected $table = 'pasivonocorriente';

    public function pasivo()
    {
        return $this->belongsTo('App\Pasivo');
    }
}
