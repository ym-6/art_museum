@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="card mt-5">
                <div class="card-header">アカウント削除</div>
                <div class="card-body">
                    <p class="lead">アカウントを削除します。よろしいですか？</p>
                    <form action="{{ route('mypages.destroy', ['id' => $user->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" />
                        </div>
                        <div class="form-group">
                            <label for="user_name">ユーザー名</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name', $user->user_name) }}" />
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="{{ route('mypages.show', ['id' => $user->id]) }}" class="btn btn-primary">戻る</a>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-danger">削除する</button>
                            </div>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
