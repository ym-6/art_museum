<?php

namespace App\Http\Controllers;

use App\Museum;
use App\Review;
use App\Prefecture;
use App\User;
use App\Criterion;
use App\Image;

use Illuminate\Http\Request;
use App\Http\Requests\CreateData;
use Illuminate\Support\Facades\Session;

class RegistrationController extends Controller
{
    // 美術館登録（フォーム表示）
    public function createMuseumForm(Museum $museums)
    {
        return redirect()->route('museum_form/museum_reg');
    }

    // 美術館登録
    public function createMuseum(CreateData $request)
    {
        $museums = new Museum; // Museumモデルの新しいインスタンスを作成

        $columns = ['name', 'prefectures_id', 'address', 'tel'];

        foreach ($columns as $column) {
            $museums->$column = $request->$column;
        }

        // ユーザーIDを設定
        $museums->user_id = Auth::id();

        // 美術館IDを設定
        $museums->museums_id = Auth::id();        

        // モデルを保存
        Auth::user()->museums()->save($museums);

        // 確認画面へ
        return view('museum_form/museum_conf');
    }

    // 登録内容確認
    public function confirmMuseum()
    {
        // セッションからフォームデータを取得
        $museumData = Session::get('museumData');
    
        // フォーム内容確認ページを表示
        return view('museum_forms/museum_conf');
    }

    // 登録完了
    public function compeleteMuseum()
    {
            // 登録完了ページを表示
        return view('museum_forms/museum_comp');
    }

    // 美術館情報編集（フォーム）
    public function editMuseumForm(Museum $museums)
    {
        // ビューに美術館の情報を渡して編集フォームを表示
        return view('edit_forms/museum_edit', compact('museum'));
    }

    // 美術館情報編集
    public function editMuseum(Request $request, Museum $museums)
    {
        // フォームから送信されたデータを使って美術館の情報を更新
        $museums->update($request->all());

        // 編集した美術館の詳細ページにリダイレクト
        return redirect()->route('art_museums/museum_detail', $museums);
    }

     // 論理削除
    public function logicMuseumDelete(Museum $museums)
    {
        if ($museums) {
            $museums->logicspendingDelete();
        }
    
        return redirect('/');
    }
    

    // レビュー作成フォーム表示
    public function createReviewForm()
    {
        return redirect()->route('review_forms/review_reg');
    }

    // レビュー作成
    public function createReview(Request $request)
    {

        $reviews = new Review; // Museumモデルの新しいインスタンスを作成

        $columns = ['title', 'text', 'criterion', 'users_id', 'art_museums_id'];

        foreach ($columns as $column) {
            $reviews->$column = $request->$column;
        }

        // ユーザーIDを設定
        $reviews->user_id = Auth::id();

        // 登録内容確認ページへ
        return view('review_forms/review_conf');
    }

    // 登録内容確認
    public function confirmReview()
    {
        // セッションからフォームデータを取得
        $reviewData = Session::get('reviewData');
    
        // フォーム内容確認ページを表示
        return view('review_forms/review_conf');
    }

    // 登録完了
    public function compeleteReview()
    {
        // 登録完了ページを表示
        return view('review_forms/review_comp');
    }

    // レビュー編集（フォーム）
        public function editReviewForm(Review $reviews)
    {
        // ビューにレビューの情報を渡して編集フォームを表示
        return view('edit_forms/review_edit', compact('review'));
    }
    
    // 美術館情報編集
    public function editReview(Request $request, review $reviews)
    {
        // フォームから送信されたデータを使ってレビューの情報を更新
        $reviews->update($request->all());

        // 編集したレビューの詳細ページにリダイレクト
        return redirect()->route('reviews/review_detail', $reviews);
    }
    
    // 論理削除
    public function logicReviewDelete(Reviews $reviews)
    {
        if ($reviews) {
            $reviews->logicspendingDelete();
        }
        
        return redirect('/');
    }
    
}
