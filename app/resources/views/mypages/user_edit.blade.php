@extends('layouts.navlayout')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header">登録情報変更</div>

            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                    @endforeach
                </div>
                @endif

                <form method="POST" action="{{ route('mypages.edit', $user->id) }}">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" />
                </div>
                <div class="form-group">
                    <label for="password">新しいパスワード</label>
                    <input type="password" class="form-control" id="password" name="password" />
                </div>
                <div class="form-group">
                    <label for="password_confirmation">新しいパスワード（確認）</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" />
                </div>
                <div class="form-group">
                    <label for="user_name">ユーザー名</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name', $user->user_name) }}" />
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mx-2">入力確認</button>
                    <a href="{{ route('mypages.index') }}" class="btn btn-secondary mx-2">戻る</a>
                    <a href="{{ route('mypages.destroy', $user->id) }}" class="btn btn-danger mx-2" onclick="return confirm('アカウントを削除してもよろしいですか？')">アカウント削除</a>
                </div>
            </form>
        </nav>
      </div>
    </div>
  </div>
@endsection
