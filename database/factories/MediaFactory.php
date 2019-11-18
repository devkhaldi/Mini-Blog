<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Media;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Media::class, function (Faker $faker) {
    return [
        'file'=>$faker->imageUrl(800, 600,'technics'),
        'post_id'=> function() {
            return Post::all()->random() ;
        }
    ];
});
