<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Questionnaire;
use Faker\Generator as Faker;

$factory->define(Questionnaire::class, function (Faker $faker) {
    return [
        "title" => $faker->sentence($nbWords = 6, $variableWords = true),
        "description" => $faker->sentence($nbWords = 12, $variableWords = true)
    ];
});
