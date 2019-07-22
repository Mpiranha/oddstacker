<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    public $fillable = [
        'user_id',
    ];

    public function owner(){
        return $this->belongsTo('App\User');
    }
}
