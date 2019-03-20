<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventPrediction extends Model
{
    public function event(){
        return $this->belongsTo('App\Models\Event');
    }

    public function prediction(){
        return $this->belongsTo('App\Models\Prediction');
    }
}
