<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    protected $fillable = [
        'name', 'alias', 'sport_id', 'group_id'
    ];

    public $with = ['group'];

    public function sport(){
        
    }

    public function group(){
        return $this->belongsTo('App\Models\PredictionGroup', 'group_id');
    }
}
