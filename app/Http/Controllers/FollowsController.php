<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Follow;


class FollowsController extends Controller
{

    public function followList()
    {
        // フォロー
        $following_id = Auth::user()->followings->pluck('id');

        $follows = User::whereIn('id', $following_id)->get();

        return view('/follows/followList', ['follows' => $follows]);
    }


    public function followerList()
    {
        // フォロワー
        $followed_id = Auth::user()->followers->pluck('id');

        $followers = User::whereIn('id', $followed_id)->get();

        return view('/follows/followerList', ['followers' => $followers]);
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
        return redirect('/search');
    }
}
