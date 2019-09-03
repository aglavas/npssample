<?php

use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    const PRODUCTION_DATA = [
        ['language' => 'sw_de', 'country' => 'Switzerland - German', 'shop_name' => 'Bettzeit SW-DE'],
        ['language' => 'sw_fr', 'country' => 'Switzerland - French', 'shop_name' => 'Bettzeit SW-FR'],
        ['language' => 'sw_it', 'country' => 'Switzerland - Italian', 'shop_name' => 'Bettzeit SW-IT'],
        ['language' => 'de_de', 'country' => 'Germany', 'shop_name' => 'Bettzeit DE-DE'],
        ['language' => 'lx_de', 'country' => 'Luxembourg - German', 'shop_name' => 'Bettzeit LX-DE'],
        ['language' => 'lx_fr', 'country' => 'Luxembourg - French', 'shop_name' => 'Bettzeit LX-FR'],
        ['language' => 'pl_pl', 'country' => 'Poland', 'shop_name' => 'Bettzeit PL-PL'],
        ['language' => 'sp_sp', 'country' => 'Spain', 'shop_name' => 'Bettzeit SP-SP'],
        ['language' => 'mx_sp', 'country' => 'Mexico', 'shop_name' => 'Bettzeit MX-SP'],
        ['language' => 'en_en', 'country' => 'England', 'shop_name' => 'Bettzeit EN-EN'],
        ['language' => 'us_en', 'country' => 'United States', 'shop_name' => 'Bettzeit US-EN'],
        ['language' => 'au_en', 'country' => 'Australia', 'shop_name' => 'Bettzeit AU-EN'],
        ['language' => 'ru_ru', 'country' => 'Russia', 'shop_name' => 'Bettzeit RU-RU'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(\Seeds\Production\LanguageSeeder::class);
        $this->call(\Seeds\Production\QuestionSeeder::class);
        $this->call(\Seeds\Production\LabelSeeder::class);
        $this->call(\Seeds\Production\ShopSeeder::class);
        $this->call(\Seeds\Production\SurveySeeder::class);
    }
}
