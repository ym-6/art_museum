@extends('layouts.navlayout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="card mt-5">
                <div class="card-header">登録情報変更</div>
                <div class="card-body">
                <form action="{{ route('mypages.update', ['id' => $user->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
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
                            <label for="user_name">ユーザー名</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ $user->user_name }}" disabled />
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mr-2">変更</button>
                            <a href="{{ route('mypages.show', $user->id) }}" class="btn btn-secondary ml-2">戻る</a>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
