<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    //
    protected $table = 'pizza';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'description', 'price','image'
    ];

    public function orders()
    {
        return $this->hasMany('App\Orders');
    }

}
