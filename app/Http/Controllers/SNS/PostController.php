<?php

namespace App\Http\Controllers\SNS;

use App\Events\YourEventName;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models;

class PostController extends Controller
{
    public function show(Request $request)
    {
        $email = $request->session()->get('email');

        //return view('sns.snspost', compact('email','data'));
        return view('sns.snspost', compact('email'));
    }

    public function post(Request $request)
    {
        if ($request->file('image')) {
            $path = $request->file('image')->store('public/img');
        } else {
            $path = NULL;
        }

        $newPost = Models\SnsPost::create([
            'email' => $request->email,
            'text' => $request->text,
            'image_filename' => basename($path),
        ]);
        //event(new YourEventName($newPost));
        return redirect("/sns");
    }

    public function reply()
    {
    }
}
