<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class patrimonioneto extends Model
{
    //
    protected $table = 'patrimonioneto';

    public function pasivo()
    {
        return $this->belongsTo('App\Pasivo');
    }
}
