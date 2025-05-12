<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function profile(): View
    {
        return view('profiles.profile');
    }

    // 他ユーザーのプロフィール移動
    public function otherProfile($id)
    {
        // 受け取ったIDを参照にUserとpostを取得
        $profiles = User::where('id', $id)->first();
        $posts = Post::with('user')->where('user_id', $id)->get();

        return view(
            '/profiles/otherProfile',
            [
                'profiles' => $profiles,
                'posts' => $posts
            ]
        );
    }

    //プロフィール編集
    public function profileUpdate(ProfileUpdateRequest $request): RedirectResponse
    {
        $id = Auth::id();
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $bio = $request->bio;

        // 画像の登録処理
        if ($request->hasFile('icon_image')) {
            $filename = $request->icon_image->getClientOriginalName();
            $request->icon_image->storeAs('public', $filename);
        } else {
            // 画像の新規入力が空なら現状の維持
            $filename = Auth::user()->icon_image;
        }
        // 更新の処理
        User::where('id', $id)->update([
            'username' => $username,
            'email' => $email,
            'password' => $password ? Hash::make($password) : Auth::user()->password,
            'bio' => $bio,
            'icon_image' => $filename,
        ]);
        return redirect('/top');
    }
}
