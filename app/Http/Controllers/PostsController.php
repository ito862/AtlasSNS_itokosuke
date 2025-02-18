<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // toArray()を使って配列型にする
        $following_id = $user->followings->pluck('id')->toArray();
        $all_id = array_merge([$user->id], $following_id);
        $posts = Post::whereIn('user_id', $all_id)->latest()->get();

        return view('/posts/index', ['posts' => $posts]);
    }

    //投稿登録
    public function postsCreate(Request $request)
    {
        // バリデーション
        $rules = [
            'post' => 'required|min:1|max:500'
        ];
        $messages = [
            'post.required' => '投稿内容を入力してください。',
            'post.min' => '投稿は1文字以上で入力してください。',
            'post.max' => '投稿は500文字以内で入力してください。',
        ];
        $this->validate($request, $rules, $messages);

        $user_id = Auth::user()->id;
        $post = $request->input('post');

        Post::create([
            'user_id' => $user_id,
            'post' => $post,
        ]);
        return redirect('/top');
    }

    // 投稿編集
    public function postEdit(Request $request)
    {
        $rules = [
            'post' => 'required|min:1|max:500'
        ];
        $messages = [
            'post.required' => '投稿内容を入力してください。',
            'post.min' => '投稿は1文字以上で入力してください。',
            'post.max' => '投稿は500文字以内で入力してください。',
        ];
        $this->validate($request, $rules, $messages);
        $id = $request->input('id');
        $edit_post = $request->input('post_edit');

        post::Where('id', $id)->update([
            'post' => $edit_post
        ]);
        return redirect('/top');
    }

    // 投稿削除
    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }
}
