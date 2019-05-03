<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['teamA_id', 'teamB_id', 'competition_id', 'event_schedule' ];
    public $with = ['teamA', 'teamB'];

    public function competition(){

    }

    public function sport(){

    }

    public function predictions(){
        
    }

    public function teamA(){
        return $this->belongsTo('App\Models\Team', 'teamA_id');
    }

    public function teamB(){
        return $this->belongsTo('App\Models\Team', 'teamB_id');
    }
}
