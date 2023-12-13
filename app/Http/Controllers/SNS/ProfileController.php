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
        $icon_filename = $request->session()->get('icon_filename');

        $data = $this->select($email);
        //$data = $this->select('w@w.w');

        return view('profile', compact('data', 'email', 'icon_filename'));
        //return view('profile', ['email' => $email], ['icon_filename' => $icon_filename]);
    }

    public function update(Request $request)
    {

        DB::table('users')
            ->where('email', $request->email)
            ->update(['name' => $request->name]);

        DB::table('sns_profiles')
            ->where('email', $request->email)
            ->update(['comment' => $request->comment, 'history' => $request->history]);

        $data = $this->select($request->email);

        return view('profile', ['data' => $data]);
    }
}
