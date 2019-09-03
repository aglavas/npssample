<?php

namespace Seeds\Production;

use App\Entities\Shop;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = [];

        foreach (\ProductionSeeder::PRODUCTION_DATA as $data) {
            array_push($query, [
                'lang' => $data['language'],
                'name' => $data['shop_name'],
            ]);
        }

        Shop::insert($query);
    }
}
