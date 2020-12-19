<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table = 'transaction';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id_users', 'id_cart', 'total'
    ];

    public function cart()
    {
        return $this->belongsTo('App\Cart', 'id_cart', 'id');
    }
}
