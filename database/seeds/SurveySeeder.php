<?php

use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $lang = factory(\App\Entities\Language::class)->create();

            $shop = factory(\App\Entities\Shop::class)->create(['lang' => $lang->locale]);

            for ($j = 1; $j <= 3; $j++) {
                factory(\App\Entities\Survey::class)->create(['shop_id' => $shop->id ,'lang' => $lang->locale, 'event_type' => $j]);
            }
        }
    }
}
