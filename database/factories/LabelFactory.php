<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Entities\Label::class, function (Faker $faker) {

    $languages = \App\Entities\Language::all();

    $query = [];

    $localeArray = [];

    foreach ($languages as $language) {
        array_push($localeArray, $language->locale);
        $query[$language->locale]['content'] = $faker->sentence;
    }

    \Illuminate\Support\Facades\Config::set('translatable.locales', $localeArray);
    $locales = \Illuminate\Support\Facades\Config::get('translatable.locales');

    return $query;
});
