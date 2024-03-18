@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-left">管理者専用画面</h3>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>投稿ID</th>
                        <th>ユーザ名</th>
                        <th>レビュー</th>
                        <th>投稿日時</th>
                        <th>いいね数</th>
                        <th>投稿詳細</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <!-- ユーザ名の表示 -->
                            <td>{{ $post->user->name }}</td>
                            <!-- レビュータイトルの表示 -->
                            <td>{{ $post->reviews->title }}</td>
                            <!-- 投稿日時の表示 -->
                            <td>{{ $post->posted_at }}</td>
                            <!-- いいね数の表示 -->
                            <td>{{ $post->like_count }}</td>
                            <!-- 投稿詳細のリンク -->
                            <td><a href="{{ route('mypages.index', ['user_id' => $post->user_id]) }}">詳細</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- ページネーションリンクを表示 -->
    <div class="row">
        <div class="col-md-12">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
