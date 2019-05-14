<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Product::class, 25)->create();
        $categories = Category::all();

        Product::all()->each(function ($product) use($categories) {
            $product->categories()->attach($categories->random(rand(1,25))->pluck('id')->toArray());
        });
    }
}
