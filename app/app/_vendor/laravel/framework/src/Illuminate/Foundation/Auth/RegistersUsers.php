<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // バリデーション
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // 入力されたデータをセッションに保存
        $request->session()->put('registration_data', $request->all());

        // パスワードもセッションに保存する
        $request->session()->put('registration_data.password', $request->input('password'));

        // 確認画面を表示
        return view('auth.register_conf')->with([
            'email' => $request->input('email'),
            'user_name' => $request->input('user_name'),
            'password' => $request->input('password'), 
        ]);
    }

    /**
     * Complete the registration process.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function complete(Request $request)
    {
        // セッションから登録データを取得
        $data = $request->session()->get('registration_data');

        // $data がnullでないかチェック
        if ($data) {
            // 'user_name'、'email'、'password' がnullでないかチェック
            if (isset($data['user_name']) && isset($data['email']) && isset($data['password'])) {
                // ユーザーを作成
                $user = $this->create([
                    'user_name' => $data['user_name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                ]);
            
                // ユーザーをログイン
                $this->guard()->login($user);
            
                // 登録完了画面を表示
                return view('auth.register_comp');
            }
        }
    }
    
    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
