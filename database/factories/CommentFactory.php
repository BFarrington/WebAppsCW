<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->realText($maxNbChars = 25),
        'post_id' => $faker->randomElement(App\Post::get()),
        'user_id' => $faker->randomElement(App\User::get()),
    ];
});
