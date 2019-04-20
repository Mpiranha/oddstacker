<?php

use App\Models\Wallet;
use App\User;
use Illuminate\Database\Seeder;

class WalletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstUser = User::findOrFail(1);

        $wallet = new Wallet([
            'balance' => 2000.00,
            'user_id' => $firstUser->id,
        ]);
        $wallet->save();
    }
}
