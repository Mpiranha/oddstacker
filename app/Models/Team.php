<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $fillable = ['name', 'logo', 'type', 'country_id', 'league_id', 'sport_id'];
}
