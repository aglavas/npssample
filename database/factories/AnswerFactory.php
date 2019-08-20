<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Entities\Answer::class, function (Faker $faker) {

    return [
        'rating' => $faker->numberBetween(1, 10),
        'content' => $faker->text,
        'label_id' => $faker->numberBetween(1, 5),
        'survey_id' => $faker->uuid
    ];
});
