<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventPrediction extends Model
{
    protected $fillable = ['prediction_id', 'event_id', 'rating'];
    public function event(){
        return $this->belongsTo('App\Models\Event');
    }

    public function prediction(){
        return $this->belongsTo('App\Models\Prediction');
    }

    public function eventPredictionExist($event_id, $prediction_id){
        return (new EventPrediction())
            ->where('event_id', $event_id)->where('prediction_id', $prediction_id)->first();
    } 
}
