@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">マイページ</div>

                <div class="card-body">
                    <div class="row">
                        <!-- 左側のカラム -->
                        <div class="col-md-6 border-end">
                            <p><a href="{{ route('mypages.show', ['id' => $user->id]) }}">登録情報編集</a></p>
                            <!-- 管理者ユーザーのみ表示 -->
                            @if (Auth::user()->is_admin)
                                <p><a href="{{ route('owner.index') }}">管理者ページ</a></p>
                            @endif
                        </div>

                        <!-- 右側のカラム -->
                        <div class="col-md-6">
                            <p><a href="{{ route('histories.index') }}">来訪歴</a></p>
                            <p><a href="{{ route('bookmarks.index', ['id' => $user->id]) }}">ブックマーク</a></p>
                            <p><a href="{{ route('myreviews.index', ['id' => $user->id]) }}">マイレビュー</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="{{ route('index') }}" class="btn btn-primary col-1">戻る</a>
@endsection
