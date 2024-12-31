<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;


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
    public function store(Request $request): RedirectResponse
    {
        if ($request->isMethod('post')) {
            //バリデーション
            $request->validate([
                'username' => 'required|min:2|max:12',
                'email' => 'required|email|min:5|max:40|unique:users',
                'password' => 'required|alpha_num|min:8|max:20|confirmed',
            ], [
                //エラーメッセージ
                'username.required' => 'ユーザーネームは必須です。',
                'email.required' => 'メールは必須です。',
                'password.required' => 'パスワードは必須です。',
            ]);
            $username = $request->input('username');
            $email = $request->input('email');
            $password = $request->input('password');


            //ユーザー登録
            User::create([
                'username' => $username,
                'email' => $email,
                'password' => Hash::make($password), //暗号化
            ]);
            //セッションに保存してリダイレクト
            return redirect()->route('added')->with('username', $username);
        }
        return view('auth.register');
    }

    public function added(): View
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
