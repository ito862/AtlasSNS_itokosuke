<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile(): View
    {
        return view('profiles.profile');
    }


    public function profileFrom($id) //IDの取得
    {
        $users = User::where('id', $id)->first();
        return view('profile.profile', ['users' => $users]);
    }

    //プロフィール編集
    public function profileUpdate(Request $request): RedirectResponse
    {
        if ($request->isMethod('post')) {
            // バリデーションルール
            $rules = [
                'username' => 'required|min:2|max:12',
                'email' => 'required|email|min:5|max:40|unique:users,email,' . Auth::id(),
                'password' => 'nullable|alpha_num|min:8|max:20|confirmed',
                'bio' => 'nullable|string|max:150',
                'images' => 'nullable|image|mimes:jpeg, png, bmp, gif, svg'
            ];
            //引数の値がバリデートされればリダイレクト、されなければ処理を継続
            $this->validate($request, $rules);


            $id = $request->input('id');
            $username = $request->input('username');
            $email = $request->input('email');
            $password = $request->input('password');
            $bio = $request->input('bio');
            $image = $request->input('images');

            User::where('id', $id)->update([
                'username' => $username,
                'email' => $email,
                'password' => Hash::make($password),
                'bio' => $bio,
                // 'images' => $image, //ここの処理考える
            ]);
        }

        return redirect()->route('profile.profile')->with('success', 'プロフィールを更新しました。');
    }
}
