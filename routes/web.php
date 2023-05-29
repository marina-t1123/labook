<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

// TOPページ
// Route::get('/labook', function () {
//     return view('top');
// });

// 投稿関連
Route::middleware('auth')->resource('/post', PostController::class);

// 返信関連
Route::middleware('auth')->resource('post.comments', CommentController::class)->shallow();

// いいね関連
Route::middleware('auth')->group(function () {
    Route::post('/{post}/like/store', [LikeController::class, 'store'])->name('like.store');
    Route::delete('/{post}/like/delete', [LikeController::class, 'destroy'])->name('like.destroy');
});
//未使用のためコメントアウト
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
