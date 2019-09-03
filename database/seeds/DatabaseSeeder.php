<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductionSeeder::class);
//        if (env('APP_ENV') === 'local') {
//            $this->call(TestingSeeder::class);
//        } else {
//            $this->call(ProductionSeeder::class);
//        }
    }
}
