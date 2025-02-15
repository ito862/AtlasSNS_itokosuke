<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\FollowsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__ . '/auth.php';


//ログアウト中に表示されるページ

Route::get('/added', [RegisteredUserController::class, 'added'])->name('added');

// 認証切れた際にログインページに飛ぶ
Route::get('/login', function () {
  return view('/auth/login');
})->name('login');

//ログイン中に表示されるページ
Route::middleware(['auth'])->group(function () {
  //ログアウト処理
  Route::get('/logout', [AuthenticatedSessionController::class, 'logout'])->name('/logout');

  //View
  Route::get('/top', [PostsController::class, 'index']);
  // 自分のプロフィール
  Route::get('/profile', [ProfileController::class, 'profile']);
  // 他ユーザーのプロフィール
  Route::get('/profiles/{id}/otherProfile', [ProfileController::class, 'otherProfile']);

  Route::get('/search', [UsersController::class, 'userSearch']);

  // フォローリスト
  Route::get('/followList', [FollowsController::class, 'followList']);
  // フォロワーリスト
  Route::get('/followerList', [FollowsController::class, 'followerList']);



  //投稿に関する機能
  Route::get('/posts/{id}/delete', [PostsController::class, 'delete']);

  Route::post('/posts/create', [PostsController::class, 'postsCreate']);

  Route::post('/posts/edit', [PostsController::class, 'postEdit']);

  //プロフィール編集
  Route::post('/profile/update', [ProfileController::class, 'profileUpdate']);

  //ユーザー検索
  Route::post('/search', [UsersController::class, 'search']);
  Route::post('/follow', [FollowsController::class, 'follow']);
});
