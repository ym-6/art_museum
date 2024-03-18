<?php

namespace App\Http\Controllers;

use App\Review;
use App\Museum;
use App\Prefecture;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log; // 追加

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
        // ユーザーのブックマークを取得し、bookmark_flg が true のもののみ取得する
        $bookmarks = Auth::user()->bookmarks()->where('bookmark_flg', true)->paginate(30);
        
        // ブックマークされた美術館の情報を取得
        $museums = [];
        foreach ($bookmarks as $bookmark) {
            Log::info('Art Museum ID: ' . $bookmark->art_museums_id);
            $museum = Museum::find($bookmark->art_museums_id);
            if ($museum) {
                $museums[] = $museum;
            }
        }
    
        return view('mypages.bookmark',  [
            'museums' => $museums
        ]);
    }
            
    public function myreviewindex()
    {
        // いいねしたレビューを取得
        $likedReviews = Auth::user()->likedReviews()->paginate(10);

        // 投稿したレビューを取得
        $postedReviews = Auth::user()->postedReviews()->paginate(10);

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
