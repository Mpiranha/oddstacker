<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            [
                'name' => 'Arsenal',
                'logo' => 'https://seeklogo.com/images/A/arsenal-logo-B27C071FE1-seeklogo.com.png',
            ],
            [
                'name' => 'Chelsea',
                'logo' => 'https://seeklogo.com/images/C/chelsea-fc-logo-A24FEB6BFB-seeklogo.com.png',
            ],
            [
                'name' => 'Man Utd',
                'logo' => 'https://seeklogo.com/images/M/manchester-united-fc-logo-1449339273-seeklogo.com.png',
            ],
            [
                'name' => 'Newcastle',
                'logo' => 'https://seeklogo.com/images/N/newcastle-united-logo-FB0B4713D8-seeklogo.com.png',
            ],
            [
                'name' => 'Wolves',
                'logo' => 'https://seeklogo.com/images/W/wolverhampton-wanderers-fc-logo-20C56B0ADC-seeklogo.com.png',
            ],
            [
                'name' => 'Man City',
                'logo' => 'https://seeklogo.com/images/M/manchester-city-fc-new-logo-4C45133019-seeklogo.com.png',
            ]
        ];

        foreach ($arr as $item) {
            DB::table('teams')->insert([
                'name' => $item['name'],
                'logo' => $item['logo'],
            ]);
        }
    }
}
