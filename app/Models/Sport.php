<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $fillable = [
        'name', 'image'
    ];

    public function sport_exists($sport_id) {
        return Sport::where('id', $sport_id)->first();
    }
}
