<?php

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\Sport;
use App\Models\League;

class LeagueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = Country::findOrFail(1);
        $sport = Sport::findOrFail(1);
        League::create([
            'name' => 'Premier League',
            'logo' => 'https://seeklogo.com/images/P/premier-league-new-logo-D22A0CE87E-seeklogo.com.png',
            'country_id' => $country->id,
            'sport_id' => $sport->id,
        ]);
    }
}
