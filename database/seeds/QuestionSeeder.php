<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Entities\Question::create([
            'en' => [
                'content' => 'Are you satisfied?'
            ],
            'de-SW' => [
                'content' => 'Are you satisfied? de SW'
            ],
            'de-DE' => [
                'content' => 'Are you satisfied? de DE'
            ],
            'hr' => [
                'content' => 'Jeste li zadovoljni.'
            ]
        ]);
    }
}
