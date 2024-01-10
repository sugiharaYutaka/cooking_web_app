<?php

namespace App\Http\Controllers\SNS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $email = $request->session()->get('email');

        $post_id = $request->query('post_id');
        if ($post_id == NULL) {
            $target_email = $email;
        } else {
            $sql = DB::table('sns_posts')
                ->where('id', $post_id)
                ->select('email')
                ->first();
            $target_email = $sql->email;
        }

        $icon_filename = $request->session()->get('icon_filename');

        $data = DB::table('sns_profiles')
            ->join('users', 'sns_profiles.email', '=', 'users.email')
            ->where('sns_profiles.email', $target_email)
            ->select('name', 'comment', 'history')
            ->get();

        $is_following = DB::table('sns_followers')
            ->where([
                ['follower_email', '=', $email],
                ['following_email', '=', $target_email],
            ])
            ->count();

        if (intval($is_following) > 0) {
            $is_following = true;
        } else {
            $is_following = false;
        }

        return view('profile', compact('data', 'email', 'target_email', 'icon_filename', 'is_following'));
    }

    public function update(Request $request)
    {
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

        return redirect()->back();
    }

    public function follow(Request $request)
    {
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

        return redirect()->back();
    }
}
