@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-left">管理者専用画面</h3>
        </div>
    </div>

    <div class="row mt-4 align-items-center">
    <!-- キーワード検索 -->
    <form action="{{ route('posts.index') }}" method="GET" class="mb-4">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-8 mb-2">
                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="投稿検索">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">検索</button>
            </div>
        </div>
    </div>
    <!-- 並べ替えセレクトボックス -->
    <div class="col-md-3 mb-2">
        <div class="input-group">
            @csrf
            <select class="form-select" name="sort_type" onchange="this.form.submit()">
                <option selected disabled>並べ替え</option>
                <option value="posted_asc">登録順（昇順）</option>
                <option value="posted_desc">登録順（降順）</option>
                <option value="like_asc">いいね順（昇順）</option>
                <option value="like_desc">いいね順（降順）</option>
            </select>
        </div>
    </div>
    </form>
</div>

    <div class="row mt-4">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>投稿ID</th>
                        <th>ユーザ名</th>
                        <th>タイトル/メモ</th>
                        <th>投稿日時</th>
                        <th>いいね数</th>
                        <th>投稿詳細</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
    @foreach ($user->reviews as $review)
        <tr>
            <td>{{ $review->id }}</td>
            <td>{{ $user->user_name }}</td>
            <td>{{ $review->title }}</td>
            <td>{{ $review->created_at }}</td>
            <td>@foreach ($likedreviews as $likedreview){{ $likedreviews->like_flg }}@endforeach</td>
            <td><a href="{{ route('reviews.show', ['reviews' => $review->id]) }}">詳細</a></td>
        </tr>
    @endforeach
    @foreach ($user->histories as $history)
        <tr>
            <td>{{ $history->id }}</td>
            <td>{{ $user->user_name }}</td>
            <td>{{ $history->memo }}</td>
            <td>{{ $history->created_at }}</td>
            <td></td>
            <td><a href="{{ route('histories.show', ['histories' => $history->id]) }}">詳細</a></td>
        </tr>
    @endforeach
@endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- ページネーションリンクを表示 -->
    <div class="row">
        <div class="col-md-12">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
