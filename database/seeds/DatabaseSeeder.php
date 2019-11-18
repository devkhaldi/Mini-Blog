<?php

use App\Category;
use App\Comment;
use App\Media;
use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class,10)->create() ;
        factory(Category::class,5)->create() ;
        factory(Post::class,100)->create() ;
        factory(Comment::class,600)->create() ;
        factory(Media::class,500)->create() ;
    }
}
