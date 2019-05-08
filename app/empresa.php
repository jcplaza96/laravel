<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //
    protected $table = 'empresa';

    public function balances()
    {
        return $this->hasMany('App\Balance')->orderBy('anio', 'desc');
    }

    public function perdidasGanancias()
    {
        return $this->hasMany('App\perdidasGanancias')->orderBy('anio', 'desc');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'User_empresa');
    }


}
