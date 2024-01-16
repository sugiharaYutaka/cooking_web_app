<?php

namespace App\Http\Controllers\SNS;

use App\Events\ReplyEvent;
use App\Models\SnsPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SnsReply;

class ReplyController extends Controller
{

    public function __construct()
    {
        // 'auth' ミドルウェアを使用して、'index' アクション以外のアクションにのみ適用
        $this->middleware('auth')->except('reply');
    }

    public function reply(Request $request)
    {

        $postId = $request->input('post_id');
        $comment = $request->input('comment');
        $email = $request->session()->get('email'); // セッションからユーザーのメールアドレスを取得

        if (session()->get('email')) {
            $newReply = SnsReply::create([
                'email' => $email,
                'text' => $comment,
                'post_id' => $postId,
            ]);
            broadcast(new ReplyEvent($postId));
        } else {
            session()->flash('login_message', "ログインしてください");
        }
    }
    public function replyShow(Request $request)
    {

        $postId = $request->input('post_id');

        //userテーブルのemailとsns_repliesテーブルのemailをキーにして結合
        //sns_repliesテーブルのidが一致したレコードを選択
        $allReply = SnsReply::select([
            'sns_replies.post_id',
            'sns_replies.email',
            'sns_replies.text',
        ])
            ->from('sns_replies')
            ->join('users', function ($join) use ($postId) {
                $join->on('sns_replies.email', '=', 'users.email')
                    ->where('sns_replies.post_id', '=', $postId);
            })
            ->select('users.name', 'users.icon_filename', 'sns_replies.*')
            ->orderBy('sns_replies.index', 'desc')
            ->get();


        //userテーブルのemailとsns_psotsテーブルのemailをキーにして結合
        //sns_postテーブルのidが一致したレコードを選択
        $mainPost = SnsPost::select([
            'sns_posts.id',
            'sns_posts.image_filename',
            'sns_posts.email',
            'sns_posts.text',
            'sns_posts.good',
        ])
            ->from('sns_posts')
            ->join('users', function ($join) use ($postId) {
                $join->on('sns_posts.email', '=', 'users.email')
                    ->where('sns_posts.id', '=', $postId);
            })
            ->select('users.name', 'users.icon_filename', 'sns_posts.*')
            ->orderBy('sns_posts.id', 'desc')
            ->get();

        return view('sns.reply', compact('allReply', 'mainPost'));
    }
}
