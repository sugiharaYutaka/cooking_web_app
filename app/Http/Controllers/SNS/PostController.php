<?php

namespace App\Http\Controllers\SNS;

use App\Events\YourEventName;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(Request $request)
    {
        $email = $request->session()->get('email');

        //return view('sns.snspost', compact('email','data'));
        return view('sns.snspost', compact('email'));
    }

    public function post(Request $request)
    {
        if ($request->file('image')) {
            $image = $request->file('image');
            //時間とファイル名を結合して一意のファイル名を生成
            $image_filename = time() . $image->getClientOriginalName();
            $image->move(public_path('/image/post'), $image_filename);
        } else {
            $image_filename = NULL;
        }

        $newPost = Models\SnsPost::create([
            'email' => $request->email,
            'text' => $request->text,
            'image_filename' => $image_filename,
        ]);
        //event(new YourEventName($newPost));
        return redirect("/sns");
    }
}
