<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $table = 'outlets';

    protected $guarded = [];

    public function cashier()
    {
        return $this->hasMany('App\Cashier');
    }

    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }
}
