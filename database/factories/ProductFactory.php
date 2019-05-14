<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence(),
        'image_url' => $faker->imageUrl(300, 200),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0.01, $max = 6000)
    ];
});
