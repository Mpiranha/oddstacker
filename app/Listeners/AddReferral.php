<?php

namespace App\Listeners;

use App\Events\Register;
use App\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Models\Referral;

class AddReferral
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param Registered $event
     * @return void
     */
    public function handle(Registered $event)
    {
        // dd('=-=-', $event);
        $referal_user_name = $event->referal_user_name;
        $user_name = $event->user->username;
        $user = new User();
        $user = $user->exists($referal_user_name);
        if($user) {
            $referal_id = $user->id;
            $referal = new Referral();
            $referal->addNewReferal($referal_id, $user_name);
        }
    }
}
