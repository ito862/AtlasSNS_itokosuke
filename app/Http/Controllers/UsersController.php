<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UsersController extends Controller
{
    public function userSearch(): View
    {
        // ログインしてるユーザーを除外して取得
        $users = User::where('id', '!=', Auth::id())->get();
        return view('/users/search', ['users' => $users]);
    }

    //検索処理
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        // ログインしているユーザーを除外
        $query = User::where('id', '!=', Auth::id());

        if (!empty($keyword)) {
            $users = $query->where('username', 'like', '%' . $keyword . '%')->get();
        } else {
            $users = $query->get();
        }
        return view('/users/search', ['users' => $users, 'keyword' => $keyword]);
    }
}
