<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailTransaction extends Model
{
    protected $table = 'detail_transactions';

    protected $guarded = [];

    public function package()
    {
        return $this->belongsTo('App\Package');
    }

    public function transaction()
    {
        return $this->belongsTo('App\Transaction');
    }
}
