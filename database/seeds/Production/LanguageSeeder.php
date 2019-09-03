<?php

namespace Seeds\Production;

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\ProductionSeeder::PRODUCTION_DATA as $data) {
            factory(\App\Entities\Language::class)->create([
                'locale' => $data['language'],
                'country' => $data['country']
            ]);
        }
    }
}
