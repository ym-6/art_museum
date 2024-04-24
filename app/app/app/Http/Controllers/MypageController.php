<?php

namespace App\Http\Controllers;

use App\Review;
use App\Museum;
use App\Prefecture;
use App\User;
use App\Bookmark;
use App\Like;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

class MypageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('mypages.mypage', compact('user'));
    }

    public function bookmarkindex()
    {
        // 都道府県の取得
        $prefectures = Prefecture::all();
    
        // ユーザーのブックマークを取得し、bookmark_flg が true のもののみ取得する
        $bookmarks = Auth::user()->bookmarks()
            ->where('bookmark_flg', 1)
            ->orderBy('updated_at', 'desc') // 更新日時で降順に並び替える
            ->paginate(30);
        
        // ブックマークされた美術館の情報を取得
        $museumIds = $bookmarks->pluck('art_museum_id')->toArray();
        $museums = Museum::whereIn('id', $museumIds)->get();
        
        return view('mypages.bookmark',  [
            'museums' => $museums,
            'bookmarks' => $bookmarks,
            'prefectures' => $prefectures
        ]);
    }
        
    public function myreviewindex()
    {
        // いいねしたレビューを取得
        $likedReviews = Auth::user()->likedReviews()
            ->where('like_flg', 1)
            ->with('like')
            ->orderBy('updated_at', 'desc') // 更新日時で降順に並び替える
            ->paginate(30);
    
        // 投稿したレビューを取得
        $postedReviews = Auth::user()->postedReviews()
            ->where('del_flg', 0)
            ->orderBy('updated_at', 'desc') // 更新日時で降順に並び替える
            ->paginate(30);

        return view('mypages.myreview', [
            'likedReviews' => $likedReviews,
            'postedReviews' => $postedReviews,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
