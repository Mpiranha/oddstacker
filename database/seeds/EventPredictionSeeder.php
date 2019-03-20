<?php

use Illuminate\Database\Seeder;
use App\Models\Stock;
use App\Models\Prediction;
use App\Models\Event;
use App\Models\EventPrediction;

class EventPredictionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stocks = Stock::all();
        $events = Event::all();
        $predictions = Prediction::all()->toArray();

        foreach ($stocks as $stock) {
            foreach ($events as $event) {
                $eventPrediction = new EventPrediction([
                    'stock_id' => $stock->id,
                    'event_id' => $event->id,
                    'prediction_id' => $predictions[array_rand($predictions)]['id']
                ]);

                $eventPrediction->save();
            }
        }
    }
}
