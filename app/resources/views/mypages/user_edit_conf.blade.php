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
            <form action="{{ route('user_edit_conf') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled />
                </div>
                <div class="form-group">
                    <label for="password">新しいパスワード</label>
                    <input type="password" class="form-control" id="password" name="password" disabled />
                    <small>セキュリティのため非表示</small>
                </div>
                <div class="form-group">
                    <label for="name">ユーザー名</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" disabled />
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">変更</button>
                    <a href="{{ route('user_edit') }}" class="btn btn-secondary">戻る</a>
                </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection
