<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Follow;


class FollowsController extends Controller
{

    public function followList()
    {
        // フォローしている人のID取得
        $following_id = Auth::user()->followings->pluck('id');
        // 取得したIDをもとにポストを取得
        $followUsers = User::whereIn('id', $following_id)->get();
        $posts = Post::with('user')->whereIn('id', $following_id)->get();

        return view('/follows/followList', compact('followUsers', 'posts'));
    }


    public function followerList()
    {
        // フォロワー上とほぼ同じ
        $followed_id = Auth::user()->followers->pluck('id');
        $followedUsers = User::whereIn('id', $followed_id)->get();
        $posts = Post::with('user')->whereIn('id', $followed_id)->get();

        return view('/follows/followerList', compact('followedUsers', 'posts'));
    }


    // フォロー処理
    // if文を使ってフォローとフォロー解除を作る
    public function follow(Request $request)
    {
        //ここにボタンを押すとユーザーIDが格納されるようにする
        $following_id = Auth::user()->id;
        $followed_id = $request->input('id');

        // この変数で確認
        $existingFollow = Follow::where('following_id', $following_id)
            ->where('followed_id', $followed_id)
            ->first();

        if ($existingFollow) {
            $existingFollow->delete();
        } else {
            Follow::create([
                'following_id' => $following_id,
                'followed_id' => $followed_id,
            ]);
        }

        // リダイレクト先のURLを取得したbladeにする。デフォルトは/search
        return redirect($request->input('redirect_to', '/search'));
    }
}
