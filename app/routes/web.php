<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//メインページ表示
Route::get('/', [DisplayController::class, 'index']);

//美術館リスト・詳細
Route::get('/museum_list', [DisplayController::class, 'ArtMuseums'])->name('museum.list');
Route::get('/museum_detail', [DisplayController::class, 'ArtMuseums'])->name('museum.detail');

//美術館登録・編集・削除
//登録
Route::get('/registration_museum', [RegistrationController::class, 'createMuseumForm'])->name('museum.reg');
Route::post('/registration_museum', [RegistrationController::class, 'createMuseum']);
Route::get('/confirm_museum', [RegistrationController::class, 'confirmMuseum'])->name('museum.conf');
Route::get('/complete_museum', [RegistrationController::class, 'completeMuseum'])->name('museum.comp');

//編集
Route::get('/museum_edit/{museums}', [RegistrationController::class, 'editMuseumForm'])->name('museum.edit');
Route::post('/museum_edit/{museums}', [RegistrationController::class, 'editMuseum']);

//削除
Route::put('/museum/{museums}', [RegistrationController::class, 'logicmuseumDelete'])->name('museum.logic-delete');

//レビューリスト・詳細
Route::get('/review_list', [DisplayController::class, 'Reviews'])->name('review.list');
Route::get('/review_detail', [DisplayController::class, 'Reviews'])->name('review.detail');

//レビュー登録・編集・削除
//登録
Route::get('/registration_review', [RegistrationController::class, 'createReviewForm'])->name('review.reg');
Route::post('/registration_review', [RegistrationController::class, 'createReview']);
Route::get('/confirm_review', [RegistrationController::class, 'confirmReview'])->name('review.conf');
Route::get('/complete_review', [RegistrationController::class, 'completeReview'])->name('review.comp');

//編集
Route::get('/review_edit/{reviews}', [RegistrationController::class, 'editReviewForm'])->name('review.edit');
Route::post('/review_edit/{reviews}', [RegistrationController::class, 'editReview']);

//削除
Route::put('/review/{reviews}', [RegistrationController::class, 'logicreviewDelete'])->name('review.logic-delete');


//来訪歴リスト・詳細

//来訪歴登録・編集・詳細