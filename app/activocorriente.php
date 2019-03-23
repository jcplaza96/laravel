<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class activocorriente extends Model
{
    //
    protected $table = 'activocorriente';

    public function activo()
    {
        return $this->belongsTo('App\Activo');
    }
}
