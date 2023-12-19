<?php

namespace App\Http\Controllers\SNS;

use App\Events\YourEventName;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SnsReply;

class ReplyController extends Controller
{
    public function reply(Request $request){

        $postId = $request->input('post_id');
        $comment = $request->input('comment');
        $email = $request->session()->get('email'); // セッションからユーザーのメールアドレスを取得

        // SnsReplyモデルを使って新しいリプライを作成
        $newReply = SnsReply::create([
            'email' => $email,
            'text' => $comment,
            'id' => $postId,
        ]);
        /*
        $newReply = Models\SnsReply::create([
            'email' => $request->session('email'),
            'text' => $request->comment,
            'id' => $request->post_id,
        ]);*/
        //event(new YourEventName($newPost));

    }
    
}