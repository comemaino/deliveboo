<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'user_id',
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

    public static function generateSlug($name)
    {
        $init_slug = Str::slug($name, '-');
        $slug = $init_slug;
        $count = 1;
        $product_found = Product::where('slug', $slug)->first();
        while ($product_found) {
            $slug = $init_slug . '-' . $count;
            $product_found = Product::where('slug', $slug)->first();
            $count++;
        }

        return $slug;
    }

    public function orders() 
    {
        return $this->belongsToMany('App\Order');
    }

}
