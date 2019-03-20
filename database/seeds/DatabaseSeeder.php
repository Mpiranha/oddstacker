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
        $this->call([
            UsersTableSeeder::class,
            WalletsTableSeeder::class,
            TeamsTableSeeder::class,
            SportsTableSeeder::class,
            PredictionsSeeder::class,
            CompetitionsTableSeeder::class,
            EventsTableSeeder::class,
            StockCategoryTableSeeder::class,
            StockTableSeeder::class,
            EventPredictionSeeder::class
        ]);
    }
}
