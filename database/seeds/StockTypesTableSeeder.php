<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            'event', 'prediciton', 'multiple'
        ];

        foreach ($arr as $item) {
            DB::table('stock_types')->insert([
                'name' => $item,
            ]);
        }
    }
}
