<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\MuseumController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\FlagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Museum;
use App\Review;
use App\History;
use App\User;

Auth::routes();

// DisplayControllerのルート
Route::get('/', [DisplayController::class, 'index'])->name('index');
Route::get('/get-image-path/{imageName}', [ImageController::class,'mainImage']);

// 新規登録
Route::get('/register/conf', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.conf');
Route::post('/register/conf', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::get('/register/comp', [App\Http\Controllers\Auth\RegisterController::class, 'complete'])->name('register.comp');
Route::post('/register/comp', [App\Http\Controllers\Auth\RegisterController::class, 'complete']);


// パスワードリセットメールフォーム
Route::get('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// パスワードリセットリンクの送信
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// パスワードリセットメール送信完了ページ
Route::get('password/email/send', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkResponse'])->name('email.send');
// パスワードリセットフォームの送信
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('pwd.comp');


// MuseumControllerのルート
Route::get('/museums', [MuseumController::class, 'index'])->name('museums.index');
Route::get('/museums/create', [MuseumController::class, 'create'])->name('museums.create');
Route::post('/museums/store', [MuseumController::class, 'store'])->name('museums.store');
Route::post('/museums/comp', [MuseumController::class,'complete'])->name('museums.comp');
Route::get('/museums/{museum}', [MuseumController::class, 'show'])->name('museums.show');
Route::get('/museums/{museum}/edit', [MuseumController::class, 'edit'])->name('museums.edit');
Route::get('/museums/{museum}/update', [MuseumController::class, 'update'])->name('museums.update');
Route::put('/museums/{museum}/update', [MuseumController::class, 'update'])->name('museums.update');
Route::delete('/museums/{museum}/destroy', [MuseumController::class, 'destroy'])->name('museums.destroy');


//  フラグ処理
// ブックマークの追加
Route::post('/bookmark/add/{id}', [FlagController::class,'bookmarkstore'])->name('bookmark.add');
// ブックマークの削除
Route::delete('/bookmark/remove/{id}', [FlagController::class,'bookmarkdestroy'])->name('bookmark.remove');
// いいねの追加
Route::post('/like/add/{id}', [FlagController::class,'likestore'])->name('like.add');
// いいねの削除
Route::delete('/like/remove/{id}', [FlagController::class,'likedestroy'])->name('like.remove');


// ReviewControllerのルート
Route::get('/reviews', [ReviewController::class,'index'])->name('reviews.index');
Route::get('/reviews/create', [ReviewController::class,'create'])->name('reviews.create');
Route::post('/reviews/store', [ReviewController::class, 'store'])->name('reviews.store');
Route::post('/reviews/comp', [ReviewController::class,'complete'])->name('reviews.comp');
Route::get('/reviews/{reviews}', [ReviewController::class,'show'])->name('reviews.show');
Route::get('/reviews/{reviews}/edit', [ReviewController::class,'edit'])->name('reviews.edit');
Route::get('/reviews/{reviews}/update', [ReviewController::class, 'update'])->name('reviews.update');
Route::put('/reviews/{reviews}/update', [ReviewController::class, 'update'])->name('reviews.update');
Route::delete('/reviews/{reviews}/destroy', [ReviewController::class, 'destroy'])->name('reviews.destroy');


// HistoryControllerのルート
Route::get('/histories', [HistoryController::class,'index'])->name('histories.index');
Route::get('/histories/create', [HistoryController::class,'create'])->name('histories.create');
Route::post('/histories/store', [HistoryController::class, 'store'])->name('histories.store');
Route::post('/histories/comp', [HistoryController::class,'complete'])->name('histories.comp');
Route::get('/histories/{histories}', [HistoryController::class,'show'])->name('histories.show');
Route::get('/histories/{histories}/edit', [HistoryController::class,'edit'])->name('histories.edit');
Route::get('/histories/{histories}/update', [HistoryController::class, 'update'])->name('histories.update');
Route::put('/histories/{histories}/update', [HistoryController::class, 'update'])->name('histories.update');
Route::delete('/histories/{histories}/destroy', [HistoryController::class, 'destroy'])->name('histories.destroy');


// MypageControllerのルート
Route::middleware(['auth'])->group(function () {
    Route::get('/mypages', [MypageController::class,'index'])->name('mypages.index');
    Route::get('/mypages/{id}/bookmark', [MypageController::class,'bookmarkindex'])->name('bookmarks.index');
    Route::get('/mypages/{id}/myreview', [MypageController::class,'myreviewindex'])->name('myreviews.index');
    Route::get('/mypages/{id}', [UserController::class,'show'])->name('mypages.show');
    Route::post('/mypages/{id}/edit', [UserController::class,'edit'])->name('mypages.edit');
    Route::get('/mypages/{id}/update', [UserController::class,'update'])->name('mypages.update');
    Route::put('/mypages/{id}/update', [UserController::class,'update'])->name('mypages.update');
    Route::get('/mypages/{id}/destroy', [UserController::class,'destroyform'])->name('mypages.destroyform');
    Route::delete('/mypages/{id}/destroy', [UserController::class,'destroy'])->name('mypages.destroy');
});


// 管理者画面
Route::get('/owner', [OwnerController::class,'index'])->name('owner.index');
Route::get('/users', [OwnerController::class,'usersindex'])->name('users.index');
Route::delete('/users/{id}', [OwnerController::class, 'usersdestroy'])->name('users.destroy');
Route::get('/insert-old-data', [OwnerController::class, 'insertOldData']);
Route::get('/posts', [OwnerController::class,'postsindex'])->name('posts.index');
