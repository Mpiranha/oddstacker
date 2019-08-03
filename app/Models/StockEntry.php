<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockEntry extends Model
{
    protected $fillable = ['stock_id', 'user_id'];

    public function selections()
    {
        return $this->belongsTo('App\StockEntrySelection');
    }
}
