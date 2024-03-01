@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-left">管理者専用画面</h3>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <form action="{{ route('user.search') }}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" name="keyword" placeholder="ユーザ名検索">
                    <button class="btn btn-primary" type="submit">検索</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <form action="{{ route('user.search') }}" method="post">
                    @csrf
                    <select class="form-select" name="sort_type" onchange="this.form.submit()">
                        <option selected disabled>並べ替え</option>
                        <option value="posted_asc">登録順（昇順）</option>
                        <option value="posted_desc">登録順（降順）</option>
                        <option value="like_asc">あいうえお順（昇順）</option>
                        <option value="like_desc">あいうえお順（降順）</option>
                    </select>
                </form>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ユーザID</th>
                        <th>ユーザ名</th>
                        <th>登録美術館数</th>
                        <th>レビュー数</th>
                        <th>来訪歴数</th>
                        <th>詳細</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->registered_museums_count }}</td>
                        <td>{{ $user->reviews_count }}</td>
                        <td>{{ $user->histories_count }}</td>
                        <td><a href="{{ route('user.page', $user->id) }}">詳細</a></td>
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
