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

class GoodEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $good_count;
    public $post_data;
    public function __construct($post_id)
    {
        $data = $this->toriaezu($post_id); //SnsPost::where("id", "=", $post_id)->first();
        $this->good_count = $data->good;
        $this->post_data = $post_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('good-channel');
    }

    private function toriaezu($post_id)
    {
        $data = DB::table('sns_posts')
            ->where('id', $post_id)
            ->select('good')
            ->first();
        //->leftJoin('users', 'sns_posts.email', '=', 'users.email')
        //->select('sns_posts.*', 'users.name', 'users.icon_filename')
        //->orderBy('sns_posts.id', 'desc')
        //->offset($offset)
        //->limit($limit)
        //->first();

        return $data;
    }
}
