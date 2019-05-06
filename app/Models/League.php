<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $fillable = [
        'name', 'logo', 'country_id', 'sport_id'
    ];

    public function league_exist($league_name, $league_id) {
        return League::where('name', $league_name)->where('id', $league_id)->first();
    }
}
