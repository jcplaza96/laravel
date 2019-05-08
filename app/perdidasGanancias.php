<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perdidasGanancias extends Model
{
    protected $table = 'perdidasGanancias';

    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }
}
