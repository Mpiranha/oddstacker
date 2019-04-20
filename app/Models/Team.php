<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $fillable = ['name', 'logo', 'type'];
}
