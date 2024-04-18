@extends('layouts.navlayout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="card mt-5">
                <div class="card-header">新規会員登録内容確認</div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                        @foreach($errors->all() as $message)
                        <p>{{ $message }}</p>
                        @endforeach
                        </div>
                    @endif
                    <p>以下の内容で登録しますか？</p>
                    <div class="mb-3">
                        <label for="email" class="form-label">メールアドレス</label>
                        <p>{{ ($email) }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="user_name" class="form-label">ユーザー名</label>
                        <p>{{ ($user_name) }}</p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <form action="{{ route('register.comp') }}" method="post" class="md-3">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">
                            <input type="hidden" name="user_name" value="{{ $user_name }}">
                            <input type="hidden" name="password" value="{{ $password }}">
                            <button type="submit" class="btn btn-primary">登録</button>
                        </form>
                        <form action="{{ route('register.comp') }}" method="post" class="md-3">
                            @csrf
                            <button type="submit" class="btn btn-primary">戻る</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
