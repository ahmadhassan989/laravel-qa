<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
$factory->define(App\Question::class, function (Faker $faker) {
    $rand1 = rand(5, 10);
    $rand2 = rand(3, 5);
    $rand3 = rand(0, 10);
    $rand4 = rand(-3, 10);


    return [
        'title'=> rtrim($faker->sentence($rand1), "."),
        'body' => $faker->paragraphs($rand2, true),
        'views'=>rand(0, 10),
        'answers'=>rand(0, 10),
        'votes'=>rand(-3, 10),


    ];
});
