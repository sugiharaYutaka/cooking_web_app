<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\SnsPost;

class YourEventName implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->data = SnsPost::select([
            'sns_posts.id',
            'sns_posts.image_filename',
            'sns_posts.email',
            'sns_posts.text',
            'users.name',
            'users.icon_filename'
        ])
            ->from('sns_posts')
            ->orderBy('sns_posts.id', 'asc')
            ->join('users', function ($join) {
                $join->on('sns_posts.email', '=', 'users.email');
        })
            ->get();
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
