<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockCategory extends Model
{
    protected $fillable = ['odd', 'boxes', 'name', 'tie_breaker', 'tie_breaker_one', 'tie_breaker_two'];
}
