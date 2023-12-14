<?php

namespace App\Http\Controllers\SNS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    private function select($email)
    {
        $data = DB::table('sns_profiles')
            ->join('users', 'sns_profiles.email', '=', 'users.email')
            ->where('sns_profiles.email', $email)
            ->select('name', 'comment', 'history')
            ->get();

        return $data;
    }

    public function show(Request $request)
    {
        $email = $request->session()->get('email');

        if ($request->session()->has('target_email')) {
            $target_email = $request->session()->get('target_email');
            $request->session()->forget('target_email');
        } else {
            $target_email = $email;
        }

        $icon_filename = $request->session()->get('icon_filename');

        $data = $this->select($target_email);

        return view('profile', compact('data', 'email', 'target_email', 'icon_filename'));
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
            $path = $request->file('image')->store('public/img');

            DB::table('users')
                ->where('email', $email)
                ->update(['icon_filename' => basename($path)]);

            $request->session()->put('icon_filename', basename($path));
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
        return view('top');
    }
}
