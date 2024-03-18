<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\MuseumController;
use App\Http\Controllers\ReviewController;

use App\Http\Controllers\Auth\RegisterController;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Museum;
use App\Review;
use App\History;


Auth::routes();

// DisplayControllerのルート
Route::get('/', [DisplayController::class, 'index']);

// MuseumControllerのルート
// GETリクエストに対するルートの定義
Route::get('/museums', [MuseumController::class, 'index'])->name('museums.index');
Route::get('/museums/create', [MuseumController::class, 'create'])->name('museums.create');
Route::get('/museums/store', [MuseumController::class, 'store'])->name('museums.store');
Route::get('/museums/conf', [MuseumController::class,'configuration'])->name('museums.conf');
Route::get('/museums/comp', [MuseumController::class,'complete'])->name('museums.comp');
Route::get('/museums/{id}', [MuseumController::class, 'show'])->name('museums.show');
Route::get('/museums/{id}/edit', [MuseumController::class, 'edit'])->name('museums.edit');

// POSTリクエストに対するルートの定義
Route::post('/museums/store', [MuseumController::class, 'store']);
Route::post('/museums/conf', [MuseumController::class, 'configuration']);
Route::post('/museums/{id}', [MuseumController::class, 'update']);


// ReviewControllerのルート
// GETリクエストに対するルートの定義
Route::get('/reviews', [ReviewController::class,'index'])->name('reviews.index');
Route::get('/reviews/create', [ReviewController::class,'create'])->name('reviews.create');
Route::get('/reviews/{id}', [ReviewController::class,'show'])->name('reviews.show');
Route::get('/reviews/{id}/edit', [ReviewController::class,'edit'])->name('reviews.edit');


// POSTリクエストに対するルートの定義
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::post('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');

// HistoryControllerのルート
// GETリクエストに対するルートの定義

// POSTリクエストに対するルートの定義


// UserControllerのルート
// GETリクエストに対するルートの定義
Route::get('/mypage', [UserController::class, 'index'])->name('mypage');

// POSTリクエストに対するルートの定義


// 新規登録
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::get('/register/conf', [App\Http\Controllers\Auth\RegisterController::class, 'showConfirmation'])->name('register.conf');
Route::post('/register/comp', [App\Http\Controllers\Auth\RegisterController::class, 'completeRegistration'])->name('register.comp');
