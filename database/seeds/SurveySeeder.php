<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = \App\Entities\Language::all();

        $faker = Faker::create();

        foreach ($languages as $language) {
            $shop = factory(\App\Entities\Shop::class)->create(['lang' => $language->locale]);

            for ($j = 1; $j <= 3; $j++) {
                $survey = factory(\App\Entities\Survey::class)->create(['shop_id' => $shop->id ,'lang' => $language->locale, 'event_type' => $j]);

                for ($x = 1; $x <= 10; $x++) {
                    $rating = $faker->numberBetween(1, 10);

                    if ($rating < 7) {
                        $content = $faker->text;
                        $labelCollection = \App\Entities\Label::all();

                        $randomLabel = $labelCollection->random();

                        $label = $randomLabel->id;
                    } else {
                        $content = '';
                        $label = null;
                    }

                    factory(\App\Entities\Answer::class)->create(['rating' => $rating, 'label_id' => $label, 'content' => $content, 'survey_id' => $survey->id]);

                }
            }

        }

//        for ($i = 0; $i < 10; $i++) {
////            $lang = factory(\App\Entities\Language::class)->create();
//
//            $shop = factory(\App\Entities\Shop::class)->create(['lang' => $lang->locale]);
//
//            for ($j = 1; $j <= 3; $j++) {
//                $survey = factory(\App\Entities\Survey::class)->create(['shop_id' => $shop->id ,'lang' => $lang->locale, 'event_type' => $j]);
//
//                factory(\App\Entities\Answer::class, 50)->create(['survey_id' => $survey->id]);
//            }
//        }
    }
}
