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
        <div class="card-header">新規会員登録完了</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
              @foreach($errors->all() as $message)
              <p>{{ $message }}</p>
              @endforeach
              </div>
            @endif
            <p>新規会員登録が完了しました。</p>
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
