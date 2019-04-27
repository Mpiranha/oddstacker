<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The country belong to the sport.
     */
    public function sports()
    {
        return $this->belongsToMany('App\Models\Sport');
    }
}
