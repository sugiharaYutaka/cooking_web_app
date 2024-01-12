<?php

namespace App\Http\Controllers\SNS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        if ($request->session()->has('email')) {
            $email = $request->session()->get('email');
        } else {
            $email = "notlogin";
        }

        $post_id = $request->query('post_id');
        if ($post_id == NULL) {
            if (!$request->session()->has('email')) {
                return view('profile');
            } else {
                $target_email = $email;
                $icon_filename = $request->session()->get('icon_filename');
            }
        } else {
            $sql_email = DB::table('sns_posts')
                ->where('id', $post_id)
                ->select('email')
                ->first();
            $target_email = $sql_email->email;


            $sql_icon_filename = DB::table('users')
                ->where('email', $target_email)
                ->select('icon_filename')
                ->first();
            $icon_filename = $sql_icon_filename->icon_filename;
        }


        $data = DB::table('sns_profiles')
            ->join('users', 'sns_profiles.email', '=', 'users.email')
            ->where('sns_profiles.email', $target_email)
            ->select('name', 'comment', 'history')
            ->get();


        if ($email == "notlogin") {
            $is_following = 2;
        } else {
            $sql_is_following = DB::table('sns_followers')
                ->where([
                    ['follower_email', '=', $email],
                    ['following_email', '=', $target_email],
                ])
                ->count();

            if (intval($sql_is_following) > 0) {
                $is_following = 1;
            } else {
                $is_following = 0;
            }
        }

        return view('profile', compact('data', 'email', 'target_email', 'icon_filename', 'is_following'));
    }

    public function update(Request $request)
    {
        if ($request->session()->has('email')) {
            $email = $request->session()->get('email');
            $name = $request->name;
            $history = $request->history;
            $comment = $request->comment;
            if ($comment == NULL) {
                $comment = '';
            }


            if ($request->file('image')) {

                $image = $request->file('image');
                //時間とファイル名を結合して一意のファイル名を生成
                $image_filename = time() . $image->getClientOriginalName();
                $image->move(public_path('/image/icon'), $image_filename);

                //$path = $request->file('image')->store('public/img');
                DB::table('users')
                    ->where('email', $email)
                    ->update(['icon_filename' => $image_filename]);

                $request->session()->put('icon_filename', $image_filename);
            }



            DB::table('users')
                ->where('email', $email)
                ->update(['name' => $name]);

            DB::table('sns_profiles')
                ->where('email', $email)
                ->update(['comment' => $comment, 'history' => $history]);
        }

        return redirect()->back();
    }

    public function follow(Request $request)
    {
        if ($request->session()->has('email')) {
            $email = $request->session()->get('email');
            $target_email = $request->target_email;

            $request->session()->put('target_email', $target_email);


            $is_following = DB::table('sns_followers')
                ->where([
                    ['follower_email', '=', $email],
                    ['following_email', '=', $target_email],
                ])
                ->count();

            if (intval($is_following) > 0) {
                DB::table('sns_followers')
                    ->where([
                        ['follower_email', '=', $email],
                        ['following_email', '=', $target_email],
                    ])
                    ->delete();
            } else {

                DB::table('sns_followers')->insert([
                    'follower_email' => $email,
                    'following_email' => $target_email
                ]);
            }
        }

        return redirect()->back();
    }
}
