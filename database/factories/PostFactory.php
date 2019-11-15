<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->realText($maxNbChars = 25),
        'content' => $faker->realText($maxNbChars = 200),
        'user_id' => $faker->randomElement(App\User::get()),
    ];
});
