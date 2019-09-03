<?php

namespace Seeds\Production;

use App\Entities\Shop;
use App\Entities\Survey;
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
        foreach (\ProductionSeeder::PRODUCTION_DATA as $data) {
            $shop = Shop::where('lang', $data['language'])->get()->first();

            for ($j = 1; $j <= 3; $j++) {
                Survey::create(['shop_id' => $shop->id ,'lang' => $data['language'], 'event_type' => $j, 'count' => 0, 'detractors' => 0, 'passives' => 0, 'promoters' => 0]);
            }
        }
    }
}
