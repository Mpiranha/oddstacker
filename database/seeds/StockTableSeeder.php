<?php

use App\Models\Stock;
use App\Models\StockCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $stockCategory = StockCategory::all();

        for ($i = 0; $i < 3; $i++) {
            foreach ($stockCategory as $category) {
                $stock = new Stock([
                    'value' => $faker->randomFloat(2, 10000, 200000),
                    'stake' => $faker->randomFloat(2, 1000, 10000),
                    'entry' => $faker->numberBetween(10, 100),
                    'closes_at' => $faker->unixTime() ,
                    'code' => Str::random(5),
                    'category_id' => $category->id,
                    'commission' => $faker->randomFloat(2, 0, 100),
                    'margin' => 'Top Half'
                ]);

                $stock->save();
            }
        }
    }
}
