<?php

use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = config('products');

        foreach($products as $product) {
            $new_product = new Product();
            $new_product->fill($product);
            $new_product->slug = Str::slug($product['name']);
            $new_product->save();
        }
    }
}
