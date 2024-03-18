@extends('layouts.navlayout')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="card mt-5">
        <div class="card-header">パスワード再設定完了</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
              @foreach($errors->all() as $message)
              <p>{{ $message }}</p>
              @endforeach
              </div>
            @endif
            <p>パスワード再設定が完了しました。</p>
          </div>
          <form action="{{ route('login') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">ログイン画面へ</button>
          </form>
      </nav>
    </div>
  </div>
</div>
@endsection
