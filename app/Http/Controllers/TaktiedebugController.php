<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class TaktiedebugController extends Controller
{
    public function show(Request $request)
    {
        $request->session()->put('target_email', 'w@w.w');
        //$request->session()->put('icon_filename', 'tZYwSiNgokUhMWKKWduktTe88GYY1CZd0TJGi6wy.png');

        $email = $request->session()->get('email');
        $icon_filename = $request->session()->get('icon_filename');

        return view('taktiedebug', ['email' => $email], ['icon_filename' => $icon_filename]);
    }

    public function register(Request $request)
    {
        $email = $request->session()->get('email');

        $path = $request->file('image_file')->store('public/img');

        DB::table('users')
            ->where('email', $email)
            ->update(['icon_filename' => basename($path)]);

        $request->session()->put('icon_filename', basename($path));

        return redirect('/')->with(['success' => 'ファイルを保存しました']);
    }
}
