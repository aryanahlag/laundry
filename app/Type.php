<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';

    protected $guarded = [];

    public function package()
    {
        return $this->hasMany('App\Package');
    }
}
