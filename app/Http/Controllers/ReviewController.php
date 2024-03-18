<?php

namespace App\Http\Controllers;

use App\Review;
use App\Museum;
use App\Prefecture;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 都道府県の取得
        $prefecture = $request->input('prefecture');

        // 都道府県の名前を含む美術館のデータを取得
        $museums = Museum::select('id', 'prefectures_id', 'name')->get();

        // レビューの検索クエリを生成
        $query = Review::query();

        // 都道府県検索
        if ($prefecture) {
            $query->whereHas('museum', function ($q) use ($prefecture) {
                $q->where('prefectures_id', $prefecture);
            });
        }

        // 検索結果を取得し、ページネーションを適用
        $reviews = $query->latest()->paginate(30);

        // ページ数を取得
        $pageCount = $reviews->lastPage();

        // 美術館一覧ビューを返す
        return view('reviews.review_list', [
            'reviews' => $reviews,
            'museums' => $museums,
            'pageCount' => $pageCount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('review_forms.review_reg');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reviews = Review::findOrFail($id);
        // レビューに関連する美術館情報を取得
        $museums = $reviews -> museums;
    
        return view('reviews.review_detail', [
            'reviews' => $reviews, 
            'museums' => $museums,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
