@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-left">投稿検索</h3>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="ワード検索">
                <button class="btn btn-primary" type="button">検索</button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <select class="form-select">
                    <option selected>ソート</option>
                    <option value="1">投稿日（昇順）</option>
                    <option value="2">投稿日（降順）</option>
                    <option value="3">いいね数（昇順）</option>
                    <option value="4">いいね数（降順）</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>投稿ID</th>
                        <th>ユーザ名</th>
                        <th>美術館名</th>
                        <th>投稿日時</th>
                        <th>いいね数</th>
                        <th>詳細</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->users_name }}</td>
                        <td>{{ $post->museums_name }}</td>
                        <td>{{ $post->posted_at }}</td>
                        <td>{{ $post->reviews_like_flg }}</td>
                        <td><a href="{{ route('user.page', $user_id) }}">詳細</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- ページ遷移 -->
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <!-- ページ数を表示 -->
                    @for ($i = 1; $i <= $pageCount; $i++)
                        <li class="page-item"><a class="page-link" href="#">{{ $i }}</a></li>
                    @endfor
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
