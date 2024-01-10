<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return Models\User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function show()
    {
        return view('auth/register');
    }

    public function process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'email_confirmation' => 'required|email|same:email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => '名前を入力してください。',
            'name.string' => '名前は文字列で入力してください。',
            'name.max' => '名前は255文字以内で入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.string' => '正しい形式のメールアドレスを入力してください。',
            'email.email' => '有効なメールアドレスを入力してください。',
            'email.max' => 'メールアドレスは255文字以内で入力してください。',
            'email.unique' => 'そのメールアドレスは既に登録されています。',
            'email_confirmation.required' => 'メールアドレス（確認用）を入力してください。',
            'email_confirmation.email' => '有効なメールアドレスを入力してください。',
            'email_confirmation.same' => '確認用メールアドレスが一致しません。',
            'password.required' => 'パスワードを入力してください。',
            'password.string' => 'パスワードは文字列で入力してください。',
            'password.min' => 'パスワードは8文字以上で入力してください。',
            'password.confirmed' => 'パスワードが一致しません。',
        ]);

        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }

        $name = $request->input('name');
        $email = $request->input('email');

        // セッションに保存された値を取得して表示する例
        $savedName = $request->session()->get('name');
        $savedEmail = $request->session()->get('email');
        $savedIconFileName = $request->session()->get('icon_filename');

        Models\User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' =>  Hash::make($request->password),
        ]);
        Models\SnsProfile::create([
            'email' => $request->email,
            'history' => 0,
            'comment' => '',
        ]);
        Models\Chapter::create([
            'email' => $request->email,
            'progress' => 1,
        ]);

        $data = Models\User::where('email', $email)->first();
        Auth::login($data);
        session([
            "email" => $data->email,
            "name" => $data->name,
            "icon_filename" => $data->icon_filename,
        ]);


        return redirect("/top");
    }
}
