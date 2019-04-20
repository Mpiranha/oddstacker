<?php

use App\Models\Sport;
use App\Models\Competition;
use Illuminate\Database\Seeder;

class CompetitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sports = Sport::all();
        $arr = ['FA CUP', 'ENGLISH PREMIER LEAGUE', 'CARABOA CUP'];
        foreach ($sports as $sport) {
            for ($i = 0; $i < count($arr); $i++) {
                $competition = new Competition([
                    'name' => $arr[$i],
                    'sport_id' => $sport->id
                ]);
                $competition->save();
            }
        }
    }
}
