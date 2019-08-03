<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockEntrySelection extends Model
{
    protected $fillable = ['stock_id', 'entry_id', 'stock_event_id', 'odd', 'tie_breaker'];

    public function entry()
    {
        return $this->hasMany('App\StockEntry');
    }
}
