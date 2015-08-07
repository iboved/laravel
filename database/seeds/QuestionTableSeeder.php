<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        \App\Question::create([
            'title' => $faker->realText($faker->numberBetween(10,20)),
            'description' => $faker->text(200),
            'active' => $faker->numberBetween(0, 1),
            'user_id' => 1,
        ]);

        \App\Question::create([
            'title' => $faker->realText($faker->numberBetween(10,20)),
            'description' => $faker->text(200),
            'active' => $faker->numberBetween(0, 1),
            'user_id' => 2,
        ]);

        \App\Question::create([
            'title' => $faker->realText($faker->numberBetween(10,20)),
            'description' => $faker->text(200),
            'active' => $faker->numberBetween(0, 1),
            'user_id' => 3,
        ]);
    }
}
