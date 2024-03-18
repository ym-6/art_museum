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
                    <p>メールアドレス： {{ session('email') }}</p>
                    <p>ユーザー名： {{ session('user_name') }}</p>
                    <form action="{{ route('register_comp') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">登録</button>
                    </form>
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">戻る</button>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
