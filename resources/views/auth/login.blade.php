@extends('layouts.navlayout')

@section('content')
  <!-- <style>
    .container {
      border: 1px solid rgba(0, 0, 0, 0.3); /* 枠線 */
      background-color: rgba(255, 255, 255, 0.3); /* 背景色 */
    }
  </style> -->

  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header">ログイン</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
              @csrf
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" class="form-control" id="password" name="password" />
                </div>
                <div class="text-center">
                    <a href="{{ route('password.request') }}">パスワードを忘れた方はこちら</a>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">ログイン</button>
                </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection
