<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Http\Requests\Auth\RegisterRequest;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request)
    {
        if ($request->isMethod('post')) {
            $username = $request->username;
            $email = $request->email;
            $password = $request->password;
            //ユーザー登録
            User::create([
                'username' => $username,
                'email' => $email,
                'password' => Hash::make($password), //暗号化
            ]);
            //セッションに保存してリダイレクト
            return redirect()->route('added')->with('username', $username);
        }
        // POST送信じゃない場合/registerを表示する
        return view('auth.register');
    }

    public function added()
    {
        //登録完了ページにデータを渡す
        $username = session('username');
        //セッションが空の場合registerに戻る
        if (!$username) {
            return redirect()->route('register');
        }
        return view('auth.added', compact('username'));
    }
}
