<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sports')->insert([
            'name' => 'SOCCER',
            'image' => 'https://pngimage.net/wp-content/uploads/2018/06/nike-soccer-ball-png-1.png'
        ]);

    }
}
