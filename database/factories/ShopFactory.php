<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Entities\Shop::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'lang' => $faker->unique()->locale,
    ];
});
