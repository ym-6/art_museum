<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 確認画面に送信されたデータを表示するためにセッションに保存
        $request->session()->flash('register_data', $request->all());

        // 確認画面にリダイレクト
        return redirect()->route('auth.register_conf');
    }

    public function showConfirmation()
    {
        // セッションから登録データを取得
        $register_data = session('register_data');

        // セッションから取得したデータを確認画面に表示
        return view('auth.register_conf', compact('register_data'));
    }

    public function completeRegistration()
    {
        // セッションから登録データを取得
        $register_data = session('register_data');

        // ユーザーを作成
        $user = User::create([
            'name' => $register_data['name'],
            'email' => $register_data['email'],
            'password' => Hash::make($register_data['password']),
        ]);

        // 登録完了画面にリダイレクト
        return view('auth.registr_comp');
    }
}
