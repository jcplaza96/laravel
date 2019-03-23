<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class activonocorriente extends Model
{
    //
    protected $table = 'activonocorriente';

    public function activo()
    {
        return $this->belongsTo('App\Activo');
    }
}
