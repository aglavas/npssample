<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Entities\Survey::class, function (Faker $faker) {

    $locale = $faker->locale;

    return [
        'shop_id' => factory(\App\Entities\Shop::class)->create(['lang' => $locale])->id,
        'lang' => $locale,
        'event_type' => rand(1, 3),
        'count' => rand(500, 99999),
        'detractors' => rand(1, 100),
        'passives' => rand(1, 100),
        'promoters' => rand(1, 100),
    ];
});

