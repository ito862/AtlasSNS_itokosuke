<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;


class UsersController extends Controller
{
    public function userSearch(): View
    {
        $users = User::get();
        return view('/users/search', ['users' => $users]);
    }

    //検索処理
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $users = User::where('username', 'like', '%' . $keyword . '%')->get();
        } else {
            $users = User::all();
        }
        return view('/users/search', ['users' => $users]);
    }
}
