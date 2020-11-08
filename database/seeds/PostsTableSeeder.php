<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
use App\Post;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {

          $user = User::inRandomOrder()->first();

          $newPost = new Post();

          $newPost->user_id = $user->id;
          $newPost->title = $faker->sentence(6, true);
          $newPost->content = $faker->paragraph(6, true);
          $newPost->excerpt = substr($newPost->content, 0, 50);
          $newPost->published = rand(0, 1);
          $newPost->slug = Str::of($newPost->title)->slug('-');

          $newPost->save();
        }
    }
}
