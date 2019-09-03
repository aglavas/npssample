<?php

use Illuminate\Database\Seeder;

class TestingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call( \Seeds\Testing\LanguageSeeder::class);
        $this->call(\Seeds\Testing\QuestionSeeder::class);
        $this->call(\Seeds\Testing\LabelSeeder::class);
        $this->call(\Seeds\Testing\SurveySeeder::class);
    }
}
