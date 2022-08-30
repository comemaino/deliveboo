<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'state',
        'costumer_fullname',
        'costumer_email',
        'costumer_address',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products() 
    {
        return $this->belongsToMany('App\Product');
    }
}
