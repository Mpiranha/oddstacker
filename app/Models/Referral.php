<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'referral_id', 'referred'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function addNewReferal($referal_id, $refered_user_name){
        Referral::create([
            'referral_id' => $referal_id,
            'referred' => $refered_user_name,
        ]);
    }
}
