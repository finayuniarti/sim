<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PenelitianEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $anggota;

    public function __construct($message, $anggota)
    {
        $this->message = $message;
        $this->anggota = $anggota;
    }

    public function broadcastOn()
    {
        return ['notification-user-'.$this->anggota];
    }

    // public function broadcastAs()
    // {
    //     return 'notification-user';
    // }
}
