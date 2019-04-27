<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    /**
     * The sport belong to the sport.
     */
    public function country()
    {
        return $this->belongsToMany('App\Models\Country');
    }
}
