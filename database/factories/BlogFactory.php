<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'category_id'   => rand(1, 3),
        'user_id'       => rand(1, 3),
        'slug'          => Str::slug($faker->sentence()),
        'judul'         => $faker->sentence(),
        'deskripsi'     => $faker->paragraph(10),
    ];
});
