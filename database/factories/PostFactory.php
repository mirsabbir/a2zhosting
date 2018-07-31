<?php

use Faker\Generator as Faker;
use App\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'slug' => str_random(12),
        'body' => $faker->paragraph,
        'image' => str_random(10),
        'category_id' => rand(1,3),
    ];
});
