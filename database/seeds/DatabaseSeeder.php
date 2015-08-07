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

        $this->call(UserTableSeeder::class);
        $this->call(QuestionTableSeeder::class);
        $this->call(AnswerTableSeeder::class);

        Model::reguard();
/*
        factory('App\User', 10)->create()->each(function($u) {
            $question = factory('App\Question')->make();

            $u->questions()->save($question);

            factory('App\Answer')->make(['user_id' => $u->id, 'question_id' => $question->id])->create();
        });*/
    }
}
