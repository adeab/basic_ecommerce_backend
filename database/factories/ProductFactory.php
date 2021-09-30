<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $title = $faker->sentence;
    $slug = str_slug($title, '-');
    $slug = $slug.'-'.uniqid();
    return [
        'name' => $title,
        'slug' => $slug,
        'description' => $faker->paragraph, 
        'price' => $faker->randomFloat(2, 0, 10000),
        'qty' => $faker->randomNumber(),
        'image' => $faker->image('public/storage/images',600,600, null, false),

    ];
});


