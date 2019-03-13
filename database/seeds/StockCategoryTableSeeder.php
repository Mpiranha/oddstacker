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
            'premium', 'head to head', 'double up'
        ];

        foreach($arr as $item){
            DB::table('stock_categories')->insert([
                'name' => $item,
                'odd' => 50
            ]);
        }
    }
}
