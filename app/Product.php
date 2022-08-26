<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'img',
        'price',
        'ingredients',
        'description',
        'visibility',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
