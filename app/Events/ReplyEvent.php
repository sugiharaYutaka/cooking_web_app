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
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReplyEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $replies_data;
    public $post_data;
    public function __construct($postId)
    {
        $this->replies_data = $this->getReplies($postId);
        $this->post_data = $this->getPost($postId);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('reply-channel');
    }

    private function getReplies($postId)
    {
        $data = DB::table('sns_replies')
        ->leftJoin('users', 'sns_replies.email', '=', 'users.email')
        ->select('sns_replies.*', 'users.name','users.icon_filename')
        ->where('sns_replies.post_id', '=', $postId)
        ->orderBy('sns_replies.created_at', 'desc')
        ->get();

        return $data;
    }
    private function getPost($postId)
    {
        $data = DB::table('sns_posts')
        ->leftJoin('users', 'sns_posts.email', '=', 'users.email')
        ->select('sns_posts.*', 'users.name','users.icon_filename')
        ->where('sns_posts.id', '=', $postId)
        ->orderBy('sns_posts.id', 'desc')
        ->get();

        return $data;
    }
}
