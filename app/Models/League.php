<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $fillable = [
        'name', 'logo', 'sport_id'
    ];

    public function league_exist($league_name, $league_id) {
        return League::where('name', $league_name)->where('id', $league_id)->first();
    }

    public function sport()
    {
        return $this->belongsTo('App\Models\Sport');
    }

    public function teams(){
        return $this->belongsToMany( 'App\Models\Team', 'teams_leagues', 'league_id', 'team_id' );
    }
}
