<?php

namespace App\Http\Controllers\SNS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models;

class PostController extends Controller
{
    public function show(Request $request)
    {
        $email = $request->session()->get('email');

        return view('sns.snspost', compact('email'));
    }

    public function post(Request $request)
    {
        $path = $request->file('image')->store('public/img');

        Models\SnsPost::create([
            'email' => $request->email,
            'text' => $request->text,
            'image_filename' => basename($path),
        ]);

        return redirect()->back();
    }
}
