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

        // バリデーションルール
        $rules = [
            'username' => 'required|min:2|max:12',
            // 現在のユーザーのメールアドレスは許可される
            'email' => 'required|email|min:5|max:40|unique:users,email,' . Auth::id(),
            'password' => 'alpha_num|min:8|max:20|confirmed',
            'bio' => 'nullable|string|max:150',
            'icon_image' => 'nullable|image|mimes:jpeg, png, bmp, gif, svg'
        ];
        // //引数の値がバリデートされればリダイレクト、されなければ処理を継続
        $this->validate($request, $rules);


        $id = $request->input('id');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $bio = $request->input('bio');

        // 画像の登録処理
        if ($request->hasFile('images')) {
            $filename = $request->images->getClientOriginalName();
            $image = $request->images->storeAs('public', $filename);
        } else {
            // 画像の新規入力が空なら現状の維持
            $filename = Auth::user()->icon_image;
        }

        User::where('id', $id)->update([
            'username' => $username,
            'email' => $email,
            'password' => $password ? Hash::make($password) : Auth::user()->password,
            'bio' => $bio,
            'icon_image' => $filename,
        ]);
        return redirect('/profile');
    }
}
