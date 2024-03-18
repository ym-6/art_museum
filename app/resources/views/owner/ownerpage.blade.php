@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 text-center">
            <h3>管理者ページ</h3>
        </div>
    </div>

    <div class="row mt-4 justify-content-center">
        <div class="col-md-2">
            <a href="{{ route('users.index') }}" class="btn btn-primary btn-lg btn-block mb-3 align-items-center d-flex text-center">ユーザ検索</a>
        </div>
        <div class="col-md-2">
            <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg btn-block mb-3 align-items-center d-flex text-center">投稿検索</a>
        </div>
    </div>
</div>
@endsection
