<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopController extends Controller
{
    public function show(Request $request)
    {
        $chapter_filenames = array(
            0 => "oyakodon.jpg",
            1 => "oyakodon.jpg",
        );
        $max_chapter = count($chapter_filenames) - 1;


        $dish_image_filename = DB::table('recipes')
            ->select('dish_image_filename')
            ->inRandomOrder()
            ->limit(10)
            ->get();


        if (!$request->session()->has('email')) {
            $chapter_filename = $chapter_filenames[1];

            return view('top', compact('dish_image_filename', 'chapter_filename'));
        } else {
            $email = $request->session()->get('email');

            $posts = DB::table('sns_posts')
                ->where([
                    ['created_at', '>=', date('Y-m-d H:i:s', time() - (30 * 24 * 60 * 60))], // 30日
                    ['email', '=', $email],
                ])
                ->select('text', 'image_filename', 'good')
                ->orderByDesc('good')
                ->limit(3)
                ->get();


            $chapter = DB::table('chapters')
                ->where('email', $email)
                ->select('progress')
                ->first();

            $now_chapter = $chapter->progress;
            $forward_chapter = $chapter->progress + 1;
            if ($forward_chapter > $max_chapter) {
                $forward_chapter = 0;
            }

            $now_chapter_filename = $chapter_filenames[$now_chapter];
            $forward_chapter_filename = $chapter_filenames[$forward_chapter];

            return view('top', compact('dish_image_filename', 'posts', 'now_chapter', 'now_chapter_filename', 'forward_chapter', 'forward_chapter_filename'));
        }
    }
}
