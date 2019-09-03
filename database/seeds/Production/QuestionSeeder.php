<?php

namespace Seeds\Production;

use App\Entities\Question;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $query = [];

        $localeArray = [];

        foreach (\ProductionSeeder::PRODUCTION_DATA as $data) {
            array_push($localeArray, $data['language']);
            $query[$data['language']]['content'] = $faker->sentence;
        }

        \Illuminate\Support\Facades\Config::set('translatable.locales', $localeArray);
        $locales = \Illuminate\Support\Facades\Config::get('translatable.locales');

        Question::create($query);
    }
}
