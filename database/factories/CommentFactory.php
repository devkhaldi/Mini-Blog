<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraph ,
        'user_id' => function () {
            return User::all()->random() ;
        },
        'post_id'=>function () {
            return Post::all()->random() ;
        }
    ];
});
