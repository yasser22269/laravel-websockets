<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $message;
    private User $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message,User $user)
    {
        $this->message = $message;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //return new Channel('public.chat.1'); //Public Chaanel
        return new PrivateChannel('private.chat.1');  //Private Channel

    }
    public function broadcastAs()
    {
        return 'chat-message';
    }
    public function broadcastWith()
    {
        return [
            'message'=> $this->message,
            'user'=> $this->user,
    ];
    }
}
