<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    //
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'username', 'email', 'password','address', 'phone_number', 'gender', 'level', 'remember_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany('App\Orders');
    }
}
