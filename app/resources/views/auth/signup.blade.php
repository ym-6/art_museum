@extends('layouts.navlayout')

@section('content')
<style>
    .container {
      border: 1px solid rgba(0, 0, 0, 0.3); /* 枠線 */
      background-color: rgba(255, 255, 255, 0.3); /* 背景色 */
    }
</style>
 
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header">新規会員登録</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('signup_conf') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password-confirm">パスワード（確認）</label>
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                </div>
                <div class="form-group">
                    <label for="name">ユーザー名</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">確認</button>
                </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection