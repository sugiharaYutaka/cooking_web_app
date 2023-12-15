<?php

namespace App\Http\Controllers\SNS;

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
    public function index()
    {

        $data = $this -> toriaezu();
        
        return view('sns.home', compact('data'));


    }



    private function toriaezu()
    {
        $data = SnsPost::select([
            'sns_posts.id',
            'sns_posts.image_filename',
            'sns_posts.email',
            'sns_posts.text',
            'users.name',
            'users.icon_filename'
          ])
          ->from('sns_posts')
          ->orderBy('sns_posts.id','asc')
          ->join('users', function($join) {
              $join->on('sns_posts.email', '=', 'users.email');
          })

          ->get();
        return $data;
    }
}
