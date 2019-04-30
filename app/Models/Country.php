<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $fillable = [
        'name', 'logo'
    ];
    /**
     * The country belong to the sport.
     */

    protected $hidden = [
        'created_at', 'updated_at',
    ];
    public function sports()
    {
        return $this->belongsToMany('App\Models\Sport');
    }
}
