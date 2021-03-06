<?php

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
        // $this->call(UserSeeder::class);

        factory(App\User::class, 3)->create()->each(function($u){
            $u->question()
              ->saveMany(
                  factory(App\Question::class, 3)->make()
              )->each(function($q){
                    $q->answer_s()
                    ->saveMany(
                        factory(App\Answer::class,rand(1,6))->make()
                    );
              });
        });
    }
}
