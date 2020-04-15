<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';

    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function detail_transaction()
    {
        return $this->hasOne('App\detailTransaksi');
    }
}
