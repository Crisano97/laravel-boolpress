<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
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
        $myUser = new User();
        $myUser->name = "Cris";
        $myUser->email = 'cris@gmail.com';
        $myUser->password = Hash::make('123cris');
        $myUser->save();

        for ($i=0; $i < 10; $i++) { 
            $user = new User();
            $user->name = $faker->userName();
            $user->email = $faker->email();
            $user->password = Hash::make($faker->password());
            $user->save();
        }

    }
}
