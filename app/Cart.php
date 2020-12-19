<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $table = 'cart';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'id_users', 'id_orders'
    ];

    public function orders()
    {
        return $this->hasMany('App\Orders', 'id_orders', 'id_orders');
    }

    public function users()
    {
        return $this->hasMany('App\Users', 'id', 'id_users');
    }

    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }

}
