<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['teamA_id', 'teamB_id', 'league_id', 'event_schedule', 'event_ending', 'sport_id'];
    public $with = ['teamA', 'teamB', 'predictions'];

    public function league(){
        return $this->belongsTo('App\Models\League', 'league_id');
    }

    public function sport(){
    }

    public function predictions()
    {
        return $this->belongsToMany('App\Models\Prediction', 'event_predictions', 'event_id', 'prediction_id');
    }


    public function teamA(){
        return $this->belongsTo('App\Models\Team', 'teamA_id');
    }

    public function teamB(){
        return $this->belongsTo('App\Models\Team', 'teamB_id');
    }
}
