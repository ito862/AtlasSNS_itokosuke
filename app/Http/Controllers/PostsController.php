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
        $posts = Post::with('user')->get();
        $users = User::get();
        return view('/posts/index', ['posts' => $posts]);
    }

    //投稿登録
    public function postsCreate(Request $request)
    {
        // バリデーション
        $rules = [
            'post' => 'required|min:1|max:500'
        ];
        $this->validate($request, $rules);

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
