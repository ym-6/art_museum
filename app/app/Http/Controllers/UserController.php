<?php

namespace App\Http\Controllers;

use App\Review;
use App\Museum;
use App\Prefecture;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = User::findOrFail($id);
        return view('mypages.user_edit', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // バリデーションルールの定義
        $rules = [
            'email' => 'required|email|max:255',
            'user_name' => 'required|string|max:255',
        ];
        
        // パスワードが入力されている場合のみバリデーションルールを追加
        if ($request->filled('password')) {
            $rules['password'] = 'required|min:8'; 
        }
        
        // バリデーション実行
        $validatedData = $request->validate($rules);

        // ユーザーモデルを取得
        $user = User::findOrFail($id);
        
        // 入力されたデータをユーザーモデルに代入
        $user->fill($validatedData);

        // セッションにデータを保存
        session()->put('user_data', $validatedData);
        
        // バリデーションが通った入力データを表示する
        return view('mypages.user_edit_conf', compact('user'));
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
        // ログインしているユーザーを取得
        $user = Auth::user();

        // セッションから確認画面で保存したデータを取得
        $validatedData = session('user_data', []);

        // パスワードが入力されている場合のみ、ハッシュ化して更新データに含める
        $updateData = [
            'email' => $validatedData['email'],
            'user_name' => $validatedData['user_name'],
        ];

        if (!empty($validatedData['password'])) {
            $hashedPassword = Hash::make($validatedData['password']);
            $updateData['password'] = $hashedPassword;
        }

        // ユーザー情報を更新
        $user->update($updateData);

        // マイページの表示にリダイレクト
        return redirect()->route('mypages.show', $user->id);
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
