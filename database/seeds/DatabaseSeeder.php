<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        Model::reguard();

        \App\User::create([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        \App\User::create([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        \App\Question::create([
            'title' => str_random(10),
            'description' => str_random(10),
            'active' => 1,
            'user_id' => 1,
        ]);

        \App\Answer::create([
            'description' => str_random(10),
            'user_id' => 2,
            'question_id' => 1,
        ]);
    }
}
