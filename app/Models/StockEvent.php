<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockEvent extends Model
{
    protected $fillable = ['event_id', 'prediction_id', 'stock_id'];
}
