<?php

namespace App\Http\Controllers;

use App\Bookmark;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlagController extends Controller
{
    // ブックマークを追加するメソッド
    public function bookmarkadd($id)
    {
        Bookmark::updateOrCreate(
            ['art_museum_id' => $id, 'user_id' => Auth::id()],
            ['bookmark_flg' => 1]
        );

        return redirect()->route('bookmark.add', ['id' => $id])->with('success', 'ブックマークを追加しました。');
    }

    // ブックマークを削除するメソッド
    public function bookmarkremove($id)
    {
        Bookmark::where('art_museum_id', $id)
            ->where('user_id', Auth::id())
            ->update(['bookmark_flg' => 0]);

        return redirect()->route('bookmark.add', ['id' => $id])->with('success', 'ブックマークを削除しました。');
    }

    // ブックマークの状態を切り替えるメソッド
    public function toggleBookmark(Request $request, $id)
    {
        $isFavorite = $request->get('isFavorite');
        
        // ブックマークが存在するかチェックし、あれば削除し、なければ追加する
        $bookmark = Bookmark::where('art_museum_id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($bookmark) {
            // ブックマークが存在する場合は削除
            $bookmark->delete();
            $isFavorite = false;
        } else {
            // ブックマークが存在しない場合は追加
            Bookmark::create([
                'art_museum_id' => $id,
                'user_id' => Auth::id(),
                'bookmark_flg' => 1
            ]);
            $isFavorite = true;
        }

        return response()->json(['success' => true, 'isFavorite' => $isFavorite]);
    }

    // いいねを追加するメソッド
    public function likeadd($id)
    {
        // いいねを追加する処理を実装する
        Like::updateOrCreate(
            ['art_museum_id' => $id, 'review_id' => $id, 'user_id' => Auth::id()],
            ['like_flg' => 1]
        );

        return redirect()->route('like.add', ['id' => $id])->with('success', 'いいねを追加しました。');

    }

    // いいねを削除するメソッド
    public function likeremove($id)
    {
        // いいねを削除する処理を実装する
        Like::where('art_museum_id', $id)
        ->where('review_id', $id)
        ->where('user_id', Auth::id())
        ->update(['like_flg' => 0]);

        return redirect()->route('like.add', ['id' => $id])->with('success', 'いいねを削除しました。');
    }

    // いいねの状態を切り替えるメソッド
    public function toggleLike(Request $request, $id)
    {
        $isLike = $request->get('isLike');
            
        // いいねが存在するかチェックし、あれば削除し、なければ追加する
        $like = Like::where('art_museum_id', $id)
            ->where('review_id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($like) {
            // いいねが存在する場合は削除
            $like->delete();
            $isLike = false;
        } else {
            // いいねが存在しない場合は追加
            Like::create([
                'art_museum_id' => $id,
                'review_id' => $id,
                'user_id' => Auth::id(),
                'like_flg' => 1
            ]);
            $isLike = true;
        }

        return response()->json(['success' => true, 'isLike' => $isLike]);
    }
    
}
