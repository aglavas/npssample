<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Entities\Language::class, function (Faker $faker) {
    return [
        'locale' => $faker->unique()->locale,
        'country' => $faker->country
    ];
});
