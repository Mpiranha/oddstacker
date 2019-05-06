<?php

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name' => 'England',
            'logo' => 'https://seeklogo.com/images/E/england-flag-logo-9A30B7DCF3-seeklogo.com.png',
        ]);
    }
}
