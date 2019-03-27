<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //
    protected $table = 'empresa';

    public function balances()
    {
        return $this->hasMany('App\Balance');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'User_empresa');
    }


}
