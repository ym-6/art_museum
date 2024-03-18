<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReview;
use App\Review;
use App\Museum;
use App\Prefecture;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;


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
        $prefectures = Prefecture::all();
        $prefectures = $request->input('prefectures');

        // 都道府県の名前を含む美術館のデータを取得
        $museum = Museum::select('id', 'prefecture_id', 'name')->get();

        // レビューの検索クエリを生成
        $query = Review::query();

        // 検索結果を取得し、ページネーションを適用
        $reviews = $query->latest()->paginate(30);

        // ページ数を取得
        $pageCount = $reviews->lastPage();

        // 美術館一覧ビューを返す
        return view('reviews.review_list', [
            'reviews' => $reviews,
            'museum' => $museum,
            'prefectures' => $prefectures,
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
        // ログインしているかどうかを確認
        if (Auth::check()) {

        // 美術館名の取得
        $museums = Museum::all();

            // ビューにデータを渡して入力画面を表示する
            return view('review_forms.review_reg', [
                'museums' => $museums,
            ]);
        } else {
            // ログインしていない場合はログインページにリダイレクト
            return redirect()->route('login');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // 確認画面
    public function store(CreateReview $request)
    {
        $data = $request->validated();

        $selectedMuseumId = $request->input('name');
        
        $museum = DB::table('art_museums')->where('id', $selectedMuseumId, 'id')->first();
        if ($museum) {
            $museumName = $museum->name;
        } else {
            // エラーハンドリングまたはデフォルト値の設定
            $museumName = 'Unknown';
        }
        $data['name'] = $museumName;
        
        $data['art_museum_id'] = $selectedMuseumId;
        
        // セッションにデータを保存
        session()->put('review_data', $data);
        // 取得したデータをビューに渡して表示
        return view('review_forms.review_conf', compact('data'));

    }
        
    // 完了画面
    public function complete()
    {
        // ログインしているユーザーのIDを取得
        $id = Auth::id();
        
        // セッションから確認画面で保存したデータを取得
        $data = session('review_data', []);

        // 'art_museum_id' を取得
        $selectedMuseumId = $data['art_museum_id'];

        // データベースから美術館の情報を取得
        $museum = DB::table('art_museums')->where('id', $selectedMuseumId)->first();

        // データが存在すれば、美術館名を取得し、存在しない場合はデフォルト値を設定
        if ($museum) {
            $museumName = $museum->name;
        } else {
            $museumName = 'Unknown';
        }

        // Reviewモデルのインスタンスを生成してデータベースに保存
        $review = new Review();
        $review->art_museum_id = $selectedMuseumId;
        $review->title = $data['title'];
        $review->body = $data['body'];
        $review->criterion = $data['criterion'];
        $review->user_id = $id;
        $review->save();

        // ビューを返す
        return view('review_forms.review_comp');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Review $reviews)
    {
        $museum = $reviews->museum;
        return view('reviews.review_detail', compact('reviews', 'museum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $reviews)
    { 
        return view('edit_forms.review_edit', compact(
            'reviews'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateReview $request, Review $reviews)
    {
        $data = $request->validated(); // バリデーションを通過したデータを取得
    
        $reviews->update([
            'title' => $data['title'],
            'body' => $data['body'],
            'criterion' => $data['criterion'],
        ]);
    
        return redirect()->route('reviews.show', $reviews->id);
    }    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $reviews)
    {
        if($reviews){
            $reviews->delete();
        }

        return redirect()->route('reviews.index');

    }
}
