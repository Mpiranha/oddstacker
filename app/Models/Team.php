<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $fillable = ['name', 'logo', 'type', 'league_id', 'sport_id'];

    public function leagues()
    {
        return $this->belongsToMany('App\Models\League', 'teams_leagues', 'team_id', 'league_id');
    }
}
