<?php

use Illuminate\Database\Seeder;
use App\Models\Prediction;
use App\Models\Sport;

class PredictionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $preds = [
            ['name' => 'HOME WIN', 'alias' => '1'],
            ['name' => 'AWAY WIN', 'alias' => '2'],
            ['name' => 'HOME WIN OR DRAW', 'alias' => '1X'],
            ['name' => 'AWAY WIN OR DRAW', 'alias' => '2X'],
            ['name' => 'HOME WIN OR AWAY WIN', 'alias' => '12'],
            ['name' => 'BOTH TEAMS TO SCORE', 'alias' => 'BTS'],
            ['name' => 'UNDER 0.5', 'alias' => 'Under 0.5'],
            ['name' => 'OVER 1.5', 'alias' => 'Over 1.5'],
            ['name' => 'CORRECT SCORE', 'alias' => 'CS']
        ];

        $sport = Sport::findOrFail(1);

        foreach ($preds as $pred) {
            $prediction = new Prediction([
                'name' => $pred['name'],
                'alias' => $pred['alias'],
                'sport_id' => $sport->id
            ]);

            $prediction->save();
        }
    }
}
