<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

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

Route::get('added', [RegisteredUserController::class, 'added']);

//ログイン中に表示されるページ
Route::get('top', [PostsController::class, 'index'])->middleware('auth');

Route::get('profile', [ProfileController::class, 'profile']);

Route::get('search', [UsersController::class, 'index']);

Route::get('follow-list', [PostsController::class, 'index']);
Route::get('follower-list', [PostsController::class, 'index']);
