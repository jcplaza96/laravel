<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activocorriente extends Model
{
    //
    protected $table = 'activocorriente';

    public function activo()
    {
        return $this->belongsTo('App\Activo');
    }
}
