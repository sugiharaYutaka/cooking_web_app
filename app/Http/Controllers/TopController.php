<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SnsPost;
use App\Models\User;

class TopController extends Controller
{
    public function show(Request $request)
    {
        $chapter_filenames = array(
            0 => "oyakodon.png",
            1 => "oyakodon.png",
        );
        $max_chapter = count($chapter_filenames) - 1;


        $posts = DB::table('sns_posts')
            ->where([
                ['created_at', '>=', date('Y-m-d H:i:s', time() - (30 * 24 * 60 * 60))] //30日
            ])
            ->select('text', 'image_filename', 'good')
            ->orderByDesc('good')
            ->limit(3)
            ->get();

        // tuika
        $datas = SnsPost::select([
            'sns_posts.id',
            'sns_posts.email',
            'sns_posts.good'
        ])
            ->from('sns_posts')
            ->join('users', function ($join) {
                $join->on('sns_posts.email', '=', 'users.email');
            })
            ->select('users.name', 'users.icon_filename')
            ->orderByDesc('good')
            ->limit(3)
            ->get();


        $dish_image_filename = DB::table('recipes')
            ->select('dish_image_filename')
            ->inRandomOrder()
            ->limit(10)
            ->get();


        if (!$request->session()->has('email')) {
            $chapter_filename = $chapter_filenames[1];

            return view('top', compact('dish_image_filename', 'posts', 'chapter_filename'));
        } else {
            $email = $request->session()->get('email');


            $chapter = DB::table('chapters')
                ->where('email', $email)
                ->select('progress')
                ->first();

            $now_chapter = $chapter->progress;
            $next_chapter = $chapter->progress + 1;
            if ($next_chapter > $max_chapter) {
                $next_chapter = 0;
            }

            $now_chapter_filename = $chapter_filenames[$now_chapter];
            $next_chapter_filename = $chapter_filenames[$next_chapter];

            return view('top', compact('dish_image_filename', 'posts', 'now_chapter', 'now_chapter_filename', 'next_chapter', 'next_chapter_filename', 'datas'));
        }
    }
}
