<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHistory;
use App\History;
use App\Museum;
use App\Review;
use App\Prefecture;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 開始日と終了日をリクエストから取得
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // ログインユーザーに関連する来訪履歴と美術館の情報を取得
        $query = Auth::user()->visit_histories()->with('museum')->latest();

        // 期間が指定されている場合は期間をフィルタリング
        if ($startDate && $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }

        // 条件に合致する来訪履歴を取得
        $histories = $query->paginate(30);

        // ページ数を取得
        $pageCount = $histories->lastPage();

        return view('visit_histories.history_list', [
            'histories' => $histories,
            'pageCount' => $pageCount,
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
            return view('history_forms.history_reg', [
                'museums' => $museums,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateHistory $request)
    {
        $data = $request->validated();

        $selectedMuseumId = $request->input('name');
        
        $museum = DB::table('art_museums')->where('id', $selectedMuseumId)->first();
        if ($museum) {
            $museumName = $museum->name;
        } else {
            // エラーハンドリングまたはデフォルト値の設定
            $museumName = 'Unknown';
        }
        $data['name'] = $museumName;
        
        $data['art_museum_id'] = $selectedMuseumId;
        
        // セッションにデータを保存
        session()->put('history_data', $data);
        // 取得したデータをビューに渡して表示
        return view('history_forms.history_conf', compact('data'));

    }

    public function complete()
    {

        // ログインしているユーザーのIDを取得
        $id = Auth::id();

        // セッションからデータを取得
        $data = session('history_data');

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

        // データベースに保存
        $history = new History();
        $history->name = $data['name'];
        $history->art_museum_id = $selectedMuseumId;
        $history->date = $data['date'];
        $history->memo = $data['memo'];
        $history->user_id = $id; // ユーザーIDを設定
        $history->save();

        // ビューを返す
        return view('history_forms.history_comp');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(History $histories)
    {
        // リレーションを利用してミュージアムを取得
        $museum = $histories->museum;
        
        // ビューに渡すデータを取得
        $history = $histories;
    
        // ビューを返す
        return view('visit_histories.history_detail', compact('history', 'museum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(History $histories)
    {
        // ビューに渡すデータを取得
        $history = $histories;
        $museum = $history->museum;
    
        return view('edit_forms.history_edit', compact(
            'history',
            'museum'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateHistory $request, History $histories)
    {
        $data = $request->validated(); // バリデーションを通過したデータを取得    
        $history = $histories;

        $history->update([
            'date' => $data['date'],
            'memo' => $data['memo'],
        ]);
    
        return redirect()->route('histories.show', $history->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $histories)
    {
        $history = $histories;

        if($history){
            $history->delete();
        }
    
        return redirect()->route('histories.index');
    }
}
