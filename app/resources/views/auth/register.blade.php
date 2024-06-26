@extends('layouts.navlayout')

@section('content')

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
                    <form action="{{ route('register.conf') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="user_name">ユーザー名</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">パスワード</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">パスワード確認</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-primary">確認</button>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
