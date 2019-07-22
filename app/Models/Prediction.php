<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    protected $fillable = [
        'name', 'alias', 'sport_id'
    ];
    public function sport(){
        
    }
}
