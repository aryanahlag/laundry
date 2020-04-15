<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = 'owners';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
