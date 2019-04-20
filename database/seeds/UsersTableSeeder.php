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
            'username' => 'pensnaku',
            'email' => 'pensnaku@gmail.com',
            'tel' => '08066080762',
            'gender' => 'male',
            'country' => 'NG',
            'state' => 'Rivers State',
            'password' => Hash::make('testing'),
        ]);

        $user->save();
    }
}
