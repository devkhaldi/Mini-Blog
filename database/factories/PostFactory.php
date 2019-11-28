<?php
use App\Category;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(6,true) ,
        'content' => $faker->paragraph ,
        'photo'=>$faker->imageUrl(800, 600,'technics'),
        'user_id' => function() {
            return User::all()->random();
        },
        'category_id' => function() {
            return Category::all()->random() ;
        }
    ];
});
