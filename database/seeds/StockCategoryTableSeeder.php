<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            'premium', 'h-2-h', 'double'
        ];

        foreach($arr as $item){
            DB::table('stock_categories')->insert([
                'name' => $item,
                'boxes' => 10,
                'odd' => 50
            ]);
        }
    }
}
