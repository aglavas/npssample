<?php

use Illuminate\Database\Seeder;

use App\Entities\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin1',
            'email' => 'admin1@nps.com',
            'password' => 'pass',
        ]);

        User::create([
            'name' => 'admin2',
            'email' => 'admin2@nps.com',
            'password' => 'pass',
        ]);

        User::create([
            'name' => 'admin3',
            'email' => 'admin3@nps.com',
            'password' => 'pass',
        ]);
    }
}
