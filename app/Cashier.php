<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
    protected $table = 'cashiers';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function outlet()
    {
        return $this->belongsTo('App\Outlet');
    }
}
