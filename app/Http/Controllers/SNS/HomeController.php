<?php

namespace App\Http\Controllers\SNS;

use App\Events\GoodEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SnsPost;
use App\Models\User;

// Pusher関連
use App\Events\YourEventName;
use Illuminate\Support\Facades\Event;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $offset = $request->query('offset');
        if ($offset == NULL) {
            $offset = 0;
        }
        $limit = $request->query('limit');
        if ($limit == NULL) {
            $limit = 3;
        }

        $data = $this->toriaezu(intval($offset), intval($limit));
        $likeCounts = []; // いいね数を格納する配列
        foreach ($data as $post) {
            // 各投稿のいいね数を取得して配列に格納
            $likeCounts[$post->id] = $this->getLikeCount($post->id);
        }

        return view('sns.home', compact('data', 'likeCounts'));
    }



    public function morePost(Request $request)
    {
        $offset = $request->query('offset');
        if ($offset == NULL) {
            $offset = 0;
        }
        $limit = $request->query('limit');
        if ($limit == NULL) {
            $limit = 10;
        }

        $data = $this->toriaezu(intval($offset), intval($limit));
        $likeCounts = []; // いいね数を格納する配列
        foreach ($data as $post) {
            // 各投稿のいいね数を取得して配列に格納
            $likeCounts[$post->id] = $this->getLikeCount($post->id);
        }

        return response()->json([
            'data' => $data,
            'likeCounts' => $likeCounts,
        ]);
    }



    private function toriaezu($offset, $limit)
    {
        $data = SnsPost::select([
            'sns_posts.id',
            'sns_posts.image_filename',
            'sns_posts.email',
            'sns_posts.text',
            'sns_posts.good',
        ])
            ->from('sns_posts')
            ->join('users', function ($join) {
                $join->on('sns_posts.email', '=', 'users.email');
            })
            ->select('users.name', 'users.icon_filename', 'sns_posts.*')
            ->orderBy('sns_posts.id', 'desc')
            ->offset($offset)
            ->limit($limit)
            ->get();

        return $data;
    }

    private function getLikeCount($postId)
    {
        // $postIdに基づいていいね数を取得する処理を実行
        $post = SnsPost::find($postId);
        if ($post) {
            return $post->good ?? 0;
        }

        return 0;
    }

    //いいね機能
    public function likePost(Request $request)
    {
        $postId = $request->post_id;
        // 該当の投稿を取得
        $post = SnsPost::find($postId);

        // 投稿が存在し、取得できた場合
        if ($post) {
            // good カラムをインクリメント
            $post->increment('good');

            // インクリメントした後の値を取得する場合
            // $newGoodValue = $post->fresh()->good;

            // 必要に応じてレスポンスなどの追加処理を行うこともできます

            //return redirect()->route('sns');
            broadcast(new GoodEvent($postId));
        } else {
            return response()->json(['message' => '投稿が見つかりません'], 404);
        }
    }
}
