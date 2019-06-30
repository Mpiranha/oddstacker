<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Registered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $referal_user_name;
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($referal_user_name, $new_user)
    {
        $this->referal_user_name = $referal_user_name;
        $this->user = $new_user;
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
