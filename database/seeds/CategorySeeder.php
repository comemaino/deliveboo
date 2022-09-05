<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'vegan',
            'pizza',
            'pesce',
            'sushi',
            'poke',
            'kebab',
            'asian',
            'fusion',
            'italiano',
            'piadina',
            'indiano',
            'cingalese',
            'fast-food',
            'slow-food',
            'hamburger',
            'gelato',
        ];

        foreach ($categories as $category) {
            $new_category = new Category();
            $new_category->name = $category;
            $new_category->slug = Str::slug($category);
            $new_category->save();
        }
    }
}
