<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'username', 'password', 'role'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function admin()
    {
        return $this->hasMany('App\Admin');
    }
    public function owner()
    {
        return $this->hasMany('App\Owner');
    }
    public function cashier()
    {
        return $this->hasMany('App\Cashier');
    }
    public function log()
    {
        return $this->hasMany('App\Log');
    }
    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }

}
