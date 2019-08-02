<?php

use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Entities\Label::create([
            'en' => [
                'content' => 'Pricing'
            ],
            'de-SW' => [
                'content' => 'Pricing de SW'
            ],
            'de-DE' => [
                'content' => 'Pricing de DE'
            ],
            'hr' => [
                'content' => 'Cijena'
            ]
        ]);
    }
}
