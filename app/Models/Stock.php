<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    public $fillable = [
        'value', 'margin', 'entry', 'closes_at', 'code', 'stake',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\StockCategory');
    }

    public function events(){
        return $this->hasManyThrough('App\Models\Event', 'App\Models\EventPrediction');
    }
}
