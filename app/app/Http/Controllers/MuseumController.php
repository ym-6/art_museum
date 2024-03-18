<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMuseum;
use App\Museum;
use App\Prefecture;
use App\Image;
use App\Review;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log; // 追加


class MuseumController extends Controller
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

        // 検索条件
        $query = Museum::query();

        // キーワードの取得
        $keyword = $request->input('keyword');

        // 都道府県の取得
        $prefecture = $request->input('prefecture');

        // もしキーワードが指定されている場合、キーワード検索条件を追加
        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }

        // もし都道府県が指定されている場合、都道府県検索条件を追加
        if ($prefecture) {
            $query->whereHas('prefecture', function (Builder $query) use ($prefecture) {
                $query->where('id', $prefecture);
            });
        }

        // 結果を取得
        $museums = $query->latest()->paginate(30);

        // ページ数を取得
        $pageCount = $museums->lastPage();

        // 美術館一覧ビューを返す
        return view('art_museums.museum_list', [
            'museums' => $museums,
            'prefectures' => $prefectures,
            'prefecture' => $prefecture,
            'keyword' => $keyword,
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

            $prefectures = Prefecture::all();

            // ビューにデータを渡して入力画面を表示する
            return view('museum_forms.museum_reg', compact('prefectures'));
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
    public function store(CreateMuseum $request)
    {
        // バリデーション済みのデータを取得
        $data = $request->validated();
    
        // アップロードされた画像を取得
        $image = $request->file('image');
    
        // 画像がアップロードされている場合は一時保存
        $imagePath = null;
        if ($image) {
            // 一時的な保存場所に画像を移動
            $imagePath = $image->store('temporary_images', 'public');
        }
    
        // 入力画面で選択された都道府県のIDを取得
        $selectedPrefectureId = $data['prefecture_id'];
    
        // 都道府県IDに対応する都道府県を取得
        $prefecture = Prefecture::find($selectedPrefectureId);
    
        // 都道府県が存在するかを確認し、存在しない場合は'Unknown'を設定
        if ($prefecture) {
            $prefectureName = $prefecture->name;
        } else {
            $prefectureName = 'Unknown';
        }
    
        // セッションにデータを保存
        session()->put('data', $data);
        session()->put('image', $imagePath); // 画像パスをセッションに保存
    
        // 入力内容と都道府県名をビューに渡して確認画面を表示する
        return view('museum_forms.museum_conf', [
            'data' => $data,
            'prefecture' => $prefectureName,
            'image_path' => $imagePath // 画像のパスをビューに渡す
        ]);
    }
    
    public function complete(Request $request)
    {
        // セッションからデータを取得
        $data = session('data', []);
    
        // データベースに美術館情報を保存
        $museum = new Museum();
        $museum->name = $data['name'];
        $museum->prefecture_id = $data['prefecture_id'];
        $museum->postalcode = $data['postalcode'];
        $museum->address = $data['address'];
        $museum->tel = $data['tel'];
        $museum->save();
        
        // 保存した美術館のIDを取得
        $museum_id = $museum->id;
    
        
        // 画像が添付されているかどうかを確認
        if ($request->hasFile('image')) {
            // 画像を保存
            $image = $request->file('image');
            $path = $image->store('public/img');
            // データベースに画像の情報を保存
            Image::create([
                'image_path' => $path,
                'art_museum_id' => $museum_id
            ]);
        }
        
        // ビューを返す
        return view('museum_forms.museum_comp', [
            'data' => $data, // データをビューに渡す
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function show(Museum $museum)
    {    
        // 美術館に関連する画像を取得
        $images = Image::where('art_museum_id', $museum->id)->get();
        return view('art_museums.museum_detail', compact(
            'museum',
            'images'
        )); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function edit(Museum $museum, Request $request)
    {
        $prefectures = Prefecture::all();        
        return view('edit_forms.museum_edit', compact('museum', 'prefectures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function update(CreateMuseum $request, Museum $museum)
    {
        // 画像が添付されているかどうかを確認
        if ($request->hasFile('image')) {
            // 画像を保存
            $image = $request->file('image');
            $path = $image->store('public/img');
            $user_id = Auth::id();
            // データベースに画像の情報を保存
            Image::create([
                'image_path' => $path, // 画像パスを設定する
                'art_museum_id' => $museum->id,
                'user_id' => $user_id
            ]);
        }
    
        $museum->update($request->except('image'));
    
        return redirect()->route('museums.show', $museum->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Museum $museum)
    {
        if($museum){
            $museum->delete();
        }

        return redirect()->route('museums.index');
    }
}
