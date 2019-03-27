<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasivocorriente extends Model
{
    //
    protected $table = 'pasivocorriente';

    public function pasivo()
    {
        return $this->belongsTo('App\Pasivo');
    }
}
