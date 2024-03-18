<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\MuseumController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\FlagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;


use App\Http\Controllers\Auth\RegisterController;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Museum;
use App\Review;
use App\History;
use App\User;

Auth::routes();

// 新規登録
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class,'register']);
Route::get('/register/conf', [App\Http\Controllers\Auth\RegisterController::class,'showConfirmation'])->name('register.conf');
Route::get('/register/comp', [App\Http\Controllers\Auth\RegisterController::class,'completeRegistration'])->name('register.comp');

// パスワードリセット
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');


// DisplayControllerのルート
Route::get('/', [DisplayController::class, 'index'])->name('index');

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
Route::post('/toggle-bookmark/{id}', [FlagController::class, 'toggleBookmark'])->name('toggle.bookmark');
Route::post('/toggle-like/{id}', [FlagController::class, 'toggleLike'])->name('toggle.like');


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
    Route::get('/mypages/bookmark', [MypageController::class,'bookmarkindex'])->name('bookmarks.index');
    Route::get('/mypages/myreview', [MypageController::class,'myreviewindex'])->name('myreviews.index');
    Route::get('/mypages/{id}', [UserController::class,'show'])->name('mypages.show');
    Route::post('/mypages/{id}/edit', [UserController::class,'edit'])->name('mypages.edit');
    Route::get('/mypages/{id}/update', [UserController::class,'update'])->name('mypages.update');
    Route::put('/mypages/{id}/update', [UserController::class,'update'])->name('mypages.update');
    Route::delete('/mypages/{id}/destroy', [UserController::class,'destroy'])->name('mypages.destroy');
});


// 管理者画面
Route::get('/owner', [OwnerController::class,'index'])->name('owner.index');
Route::get('/users', [OwnerController::class,'usersindex'])->name('users.index');
Route::delete('/users/{id}/destroy', [OwnerController::class,'usersdestroy'])->name('users.destroy');
Route::get('/posts', [OwnerController::class,'postsindex'])->name('posts.index');

