<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'content' => $faker->text(300),
        'slug' => $faker->unique()->date('Y-m-d', 'now'),
    ];
});
