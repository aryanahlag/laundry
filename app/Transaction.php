<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $guarded = [];

    public function member()
    {
        return $this->belongsTo('App\Member');
    }

    public function outlet()
    {
        return $this->belongsTo('App\Outlet');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function detailTransaction()
    {
        return $this->hasMany('App\detailTransaksi');
    }
}
