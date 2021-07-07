<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use App\Quiz;
use Faker\Generator as Faker;

$factory->define(Quiz::class, function (Faker $faker) {
    return [
        'count' => $faker->numberBetween(1,77),
        'rate' => $faker->randomElement([Quiz::STATUS_BAD, Quiz::STATUS_NEUTRAL, Quiz::STATUS_GOOD,Quiz::STATUS_FAIR ])

    ];
});


$factory->define(Question::class, function (Faker $faker) {
    return [
        'description' => $faker->paragraph
    ];
});
