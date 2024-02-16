<?php

namespace App\Http\Controllers;

use App\Museum;
use App\Review;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function index()
    {
        // 美術館の情報を取得
        $museums = Museum::latest()->take(2)->get();
        
        // 最新のレビューの情報を取得
        $reviews = Review::latest()->take(2)->get();
        
        return view('main', compact('museums', 'reviews'));
    }

    public function ArtMuseums()
    {
        // 美術館を全件取得
        $museums = Museum::all();
        
        return view('museum_list', compact('museums'));
    }

    public function Reviews()
    {        
        // レビューを全件取得
        $reviews = Review::all();
        
        return view('review_list', compact('reviews'));
    }

    public function ArtMuseumDetail(Museum $museums)
    {
        //美術館の詳細表示
        return view('art_museums/museum_detail', [
            'result' => $museums     
        ]);
    }

    public function ReviewDetail(Review $reviews)
    {
        //レビューの詳細表示
        return view('reviews/review_detail', [
            'result' => $reviews
        ]);
    }
}
