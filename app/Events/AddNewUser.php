<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AddNewUser
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $referal_user_name;
    public $new_user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($referal_user_name, $new_user)
    {
        $this->referal_user_name = $referal_user_name;
        $this->new_user = $new_user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
