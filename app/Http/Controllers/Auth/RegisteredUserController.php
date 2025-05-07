<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;


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
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            //バリデーション
            $rules = [
                'username' => 'required|min:2|max:12',
                'email' => 'required|email|min:5|max:40|unique:users',
                'password' => 'required|alpha_num|min:8|max:20|confirmed',
            ];
            $messages = [
                //エラーメッセージ
                'username.required' => 'ユーザーネームは必須です',
                'username.min' => '２文字以上入力してください',
                'username.max' => '12文字以内で入力してください',
                'email.required' => 'メールは必須です',
                'email.min' => '５文字以上入力してください',
                'email.max' => '40文字以上で入力してください',
                'email.unique' => 'このメールアドレスはすでに使われています',
                'password.required' => 'パスワードは必須です',
                'password.alpha_num' => 'パスワードは英数字のみ使用できます。',
                'password.min' => 'パスワードは8文字以上で入力してください',
                'password.max' => 'パスワードは20文字以内で入力してください',
                'password.confirmed' => 'パスワードが一致しません',
            ];
            $this->validate($request, $rules, $messages);
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
