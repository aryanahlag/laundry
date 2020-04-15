<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    protected $guarded = [];

    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }

}
