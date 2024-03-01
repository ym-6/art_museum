@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h3>管理者ページ</h3>
        </div>
    </div>

    <div class="row mt-4 justify-content-center">
        <div class="col-md-6">
            <a href="{{ route('user.list') }}" class="btn btn-primary btn-lg btn-block mb-3">ユーザ検索</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <a href="{{ route('post.list') }}" class="btn btn-primary btn-lg btn-block">投稿検索</a>
        </div>
    </div>
</div>
@endsection
