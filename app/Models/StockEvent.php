<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockEvent extends Model
{
    protected $fillable = ['event_id', 'prediction_id', 'stock_id'];

    public function event(){
        return $this->belongsTo('App\Models\Event');
    }

    public function prediction(){
        return $this->belongsTo('App\Models\Prediction');
    }

    protected function hello(){
        return "wida you";
    }

    public function getScriptVariables()
    {
        return json_encode([
            'csrfToken' => "Hey",
        ]);
    }
}
