<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'site_name';

    public $incrementing = false;
}
