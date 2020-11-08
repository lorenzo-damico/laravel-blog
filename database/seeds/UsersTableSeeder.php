<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) {

          $newUser = new User();

          $newUser->name = $faker->name();
          $newUser->email = $faker->freeEmail();
          $newUser->password = Hash::make($faker->password());

          $newUser->save();
        }
    }
}
