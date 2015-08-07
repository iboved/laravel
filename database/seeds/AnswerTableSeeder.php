<?php

use Illuminate\Database\Seeder;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        \App\Answer::create([
            'description' => $faker->text(100),
            'user_id' => 3,
            'question_id' => 1,
        ]);

        \App\Answer::create([
            'description' => $faker->text(100),
            'user_id' => 2,
            'question_id' => 1,
        ]);

        \App\Answer::create([
            'description' => $faker->text(100),
            'user_id' => 1,
            'question_id' => 2,
        ]);

        \App\Answer::create([
            'description' => $faker->text(100),
            'user_id' => 2,
            'question_id' => 3,
        ]);
    }
}
