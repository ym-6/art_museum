<?php

namespace App\Http\Controllers;

use App\Museum;
use App\Prefecture;
use App\Review;
use App\User;


use Illuminate\Http\Request;

class MuseumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // キーワードの取得
        $keyword = $request->input('keyword');

        // 都道府県の取得
        $prefecture = $request->input('prefecture');

        // 検索が行われた場合
        if ($keyword || $prefecture) {
        // クエリビルダーを使用して検索条件を組み立てる
            $query = Museum::query();

        // キーワード検索
        if ($keyword) {
            $query -> where('name', 'like', '%' . $keyword . '%');
        }

        // 都道府県検索
        if ($prefecture) {
            $query -> where('prefecture_id', $prefecture);
        }

        // 結果を取得
            $museums = $query -> get();
        } else {
            // 検索が行われなかった場合はすべての美術館を取得
            $museums = Museum::all();
        }

        $museums = Museum::latest()->paginate(30);
        // ページ数を取得
        $pageCount = $museums -> lastPage();

        // 美術館一覧ビューを返す
        return view('art_museums.museum_list', [
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
        $prefectures = Prefecture::all();
    
        // ビューにデータを渡して入力画面を表示
        return view('museum_forms.museum_reg', [
            'prefectures' => $prefectures,
        ]);
    }

    // 入力画面
    public function store(Request $request)
    {
        $request->validate([
            'museum_name' => 'required',
            'postalcode' => 'required|integer',
            'prefecture_id' => 'required',
            'address' => 'required',
            'tel' => 'required|integer',
            'image' => 'nullable|image',
        ]);
                    
        // 入力されたデータをセッションに一時保存
        $request->session()->put('museum_data', $request->all());

        return redirect()->route('museum_forms.museum_conf');
    }

    // 確認画面
    public function configuration(Request $request)
    {
        // セッションから保存されたデータを取得
        $museumdata = $request->session()->get('museum_data');

        // $museumdata が null の場合のデフォルト値を設定
        $museum_name = $museumdata['museum_name'] ?? '';
        $postalcode = $museumdata['postalcode'] ?? '';
        $prefecture = $museumdata['prefecture'] ?? '';
        $address = $museumdata['address'] ?? '';
        $tel = $museumdata['tel'] ?? '';
        $image = $museumdata['image'] ?? '';

        // ビューにデータを渡して確認画面を表示
        return view('museum_forms.museum_conf', compact(
            'museum_name', 
            'postalcode', 
            'prefecture', 
            'address', 
            'tel', 
            'image'
        ));
    }

    // 完了画面
    public function complete(Request $request)
    {
        $museumdata = $request->session()->get('museum_data');

        $request -> Museum();

        // データベースへの登録が完了したらセッションをクリア
        $request->session()->forget('museum_data');

        // 完了画面を表示
        return view('museum_forms.museum_comp');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $museums = Museum::findOrFail($id);
        return view('art_museums.museum_detail', ['museums' => $museums]);
    }
        
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function edit(Museum $museum)
    {
        return view('edit_forms.museum_edit', ['museum' => $museum]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Museum $museum)
    {
        $request->validate([
            'name' => 'required',
            'postalcode' => 'required|integer',
            'prefecture_id' => 'required',
            'address' => 'required',
            'tel' => 'required|integer',
            'image' => 'nullable|image',
        ]);

        $museum->update($request->all());

        return redirect()->route('museums.edit')
            ->with('success', 'Museum updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Museum $museum)
    {
        $museum->delete();

        return redirect()->route('museums.index')
            ->with('success', 'Museum deleted successfully');
    }
}
