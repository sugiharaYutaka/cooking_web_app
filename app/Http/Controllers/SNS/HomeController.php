<?php

namespace App\Http\Controllers\SNS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SnsPost;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // データベースからランダムに5件の投稿を取得
        $randomPosts = SnsPost::inRandomOrder()->limit(5)->get();

        $data = $this -> toriaezu();
        
        return view('sns.home', compact('randomPosts','data'));


    }

    private function toriaezu()
    {
        $data = SnsPost::select([
            'sns_posts.email',
            'sns_posts.text'
          ])
          ->from('sns_posts')
          ->join('users', function($join) {
              $join->on('sns_posts.email', '=', 'users.email');
          })
          ->select('users.name','users.icon_filename')
          ->inRandomOrder()->limit(5)->get();
        return $data;
    }
}
