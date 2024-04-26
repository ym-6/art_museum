<?php

namespace App\Http\Controllers;

use App\Bookmark;
use App\Museum;
use App\Like;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FlagController extends Controller
{
    // ブックマークを追加
    public function bookmarkstore(Request $request, $id)
    {
        $user_id = Auth::id();
        $bookmark = Bookmark::where('user_id', $user_id)
                            ->where('art_museum_id', $id)
                            ->first();
        
        // すでにブックマークが存在する場合はフラグを更新し、存在しない場合は新規作成する
        if ($bookmark) {
            $bookmark->update(['bookmark_flg' => 1]);
        } else {
            $bookmark = new Bookmark();
            $bookmark->user_id = $user_id;
            $bookmark->art_museum_id = $id;
            $bookmark->bookmark_flg = 1;
            $bookmark->save();
        }
    
        return response()->json(['status' => 'success']);
    }

    // ブックマークを削除
    public function bookmarkdestroy(Request $request, $id)
    {
        Bookmark::where('user_id', Auth::id())
                ->where('art_museum_id', $id)
                ->update(['bookmark_flg' => 0]);
    
        return response()->json(['status' => 'success']);
    }


    // いいねを追加
    public function likestore(Request $request, $id)
    {

        $user_id = Auth::id();
        $review_id = $id;
        $art_museum_id = $request->input('art_museum_id');

        $likedreview = Like::where('user_id', $user_id)
                            ->where('review_id', $review_id)
                            ->where('art_museum_id', $art_museum_id)
                            ->first();
        
        // すでにいいねが存在する場合はフラグを更新し、存在しない場合は新規作成する

        if ($likedreview) {
            $likedreview->update(['like_flg' => 1]);
        } else {
            $likedreview = new Like();
            $likedreview->user_id = $user_id;
            $likedreview->review_id = $review_id;
            $likedreview->art_museum_id = $art_museum_id;
            $likedreview->like_flg = 1;
            $likedreview->save();
        }
        
        return response()->json(['status' => 'success']);
    }

    // いいねを削除
    public function likedestroy(Request $request, $id)
    {
        $user_id = Auth::id();
        $review_id = $id;
        $art_museum_id = $request->input('art_museum_id');

        Like::where('user_id', $user_id)
            ->where('review_id', $review_id)
            ->where('art_museum_id', $art_museum_id)
            ->update(['like_flg' => 0]);

        return response()->json(['status' => 'success']);
    }
}
