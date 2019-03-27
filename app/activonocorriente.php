<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activonocorriente extends Model
{
    //
    protected $table = 'activonocorriente';

    public function activo()
    {
        return $this->belongsTo('App\Activo');
    }
}
