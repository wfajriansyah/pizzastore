<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_users', 'id_orders', 'id_pizza', 'quantity'
    ];

    public function pizza()
    {
        return $this->belongsTo('App\Pizza', 'id_pizza', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\Users', 'id_users', 'id');
    }

    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }

}
