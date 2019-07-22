<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'username' => 'frankieme',
            'email' => 'frankieetchy@gmail.com',
            'tel' => '07069297676',
            'gender' => 'male',
            'country' => 'NG',
            'state' => 'Rivers State',
            'password' => Hash::make('testing'),
        ]);

        $user->save();
    }
}
