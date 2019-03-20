<?php

use App\Models\Competition;
use App\Models\Team;
use App\Models\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $competitions = Competition::all();
        foreach ($competitions as $competition) {
            $teams = Team::all()->toArray();

            for ($i = 0; $i < 3; $i++) {
                do {
                    $teamA = $teams[array_rand($teams)]['id'];
                    $teamB = $teams[array_rand($teams)]['id'];
                } while ($teamA == $teamB);

                $event = new Event([
                    'teamA_id' => $teamA,
                    'teamB_id' => $teamB,
                    'competition_id' => $competition->id
                ]);
                $event->save();
            }
        }
    }
}
