<?php

namespace Seeds\Production;

use App\Entities\Label;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $localeArray = [];

        foreach (\ProductionSeeder::PRODUCTION_DATA as $data) {
            array_push($localeArray, $data['language']);
        }

        \Illuminate\Support\Facades\Config::set('translatable.locales', $localeArray);
        $locales = \Illuminate\Support\Facades\Config::get('translatable.locales');

        for ($i = 0; $i < 5; $i++) {
            $query = [];
            $query['title'] = $faker->word;

            foreach (\ProductionSeeder::PRODUCTION_DATA as $data) {
                $query[$data['language']]['content'] = $faker->sentence;
            }

            Label::create($query);
        }
    }
}
