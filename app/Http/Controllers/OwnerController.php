<?php

namespace App\Http\Controllers;

use App\Review;
use App\User;
use App\History;
use App\Museum;
use App\Like;
use App\SearchPost;
use App\SearchUser;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
        /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('owner.ownerpage');
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function usersindex(Request $request)
    {
        // 権限チェック
        $this->authorize('usersindex', User::class);
    
        // ユーザーのクエリビルダーを作成
        $query = User::where('del_flg', 0);
    
        // キーワードの取得
        $keyword = $request->input('keyword');
    
        // もしキーワードが指定されている場合、キーワード検索条件を追加
        if ($keyword) {
            $query->where('user_name', 'like', '%' . $keyword . '%');
        }
        
        // 並び替えオプションの取得
        $sortType = $request->input('sort_type');
    
        // 並び替え
        switch ($sortType) {
            case 'posted_asc':
                $query->orderBy('created_at', 'asc');
                break;
            case 'posted_desc':
                $query->orderBy('created_at', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('user_name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('user_name', 'desc');
                break;
            default:
                // デフォルトはIDで昇順
                $query->orderBy('id', 'asc');
                break;
        }
    
        // ページネーションを実行
        $users = $query->withCount('reviews', 'histories')->paginate(30);
    
        return view('owner.user_list', compact('users', 'keyword'));
    }
        
    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function postsindex(Request $request)
    {
        // 権限チェック
        $this->authorize('usersindex', User::class);
        
        $likedreviews = Like::with('review')
        ->where('like_flg', 1) // いいねされたもののみ取得する例
        ->get();

        // 検索条件
        $query = User::whereHas('reviews', function ($query) {
            $query->where('del_flg', 0);
        })->whereHas('histories', function ($query) {
            $query->where('del_flg', 0);
        });
                       
        // キーワードの取得
        $keyword = $request->input('keyword');
            
        // もしキーワードが指定されている場合、キーワード検索条件を追加
        if ($keyword) {
            $query->where('user_name', 'like', '%' . $keyword . '%');
        }
                    
        // 並び替えオプションの取得
        $sortType = $request->input('sort_type');
            
        // 並び替え
        switch ($sortType) {
            case 'posted_asc':
                $query->orderBy('created_at', 'asc');
                break;
            case 'posted_desc':
                $query->orderBy('created_at', 'desc');
                break;
            case 'like_asc':
                $query->orderBy('user_museum.like_flg', 'asc');
                break;
            case 'like_desc':
                $query->orderBy('user_museum.like_flg', 'desc');
                break;
            default:
                // デフォルトはIDで昇順
                $query->orderBy('id', 'asc');
                break;
        }
        
        // ページネーションを実行
        $users = $query->paginate(30);
    
        // 各ユーザーに関連するレビューと来訪歴を事前に取得しておく
        $users->load('reviews', 'histories');
    
        return view('owner.post_list', compact(
            'users',
            'likedreviews'
        ));
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
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function usersdestroy($id)
    {
        $user = User::findOrFail($id);
        $user->del_flg = 1; // 削除フラグを立てる
        $user->save();
    
        return redirect()->route('users.index');        
    }
}
