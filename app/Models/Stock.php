<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public $fillable = [
        'value', 'margin', 'entry', 'code', 'stake',
    ];

    public $with = ['category', 'margin', 'sport', 'entries', 'events'];

    public function category()
    {
        return $this->belongsTo('App\Models\StockCategory');
    }

    public function sport()
    {
        return $this->belongsTo('App\Models\Sport');
    }

    public function margin(){
        return $this->hasMany('App\Models\StockWinners');
    }

    public function entries(){
        return $this->hasMany('App\Models\StockEntry');
    }

    public function events(){
        return $this->hasMany('App\Models\StockEvent');
    }
}
