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
    <form action="{{ route('users.index') }}" method="GET" class="mb-4">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-8 mb-2">
                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="ユーザー検索">
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
                <option value="name_asc">あいうえお順（昇順）</option>
                <option value="name_desc">あいうえお順（降順）</option>
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
                        <th>ユーザID</th>
                        <th>ユーザ名</th>
                        <th>レビュー数</th>
                        <th>来訪歴数</th>
                        <th>詳細</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->user_name }}</td>
                    <td>{{ $user->reviews_count }}</td>
                    <td>{{ $user->histories_count }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('mypages.index', ['id' => $user->id]) }}" class="me-2">詳細</a>
                        </div>
                    </td>
                    <td>
                    <div class="d-flex align-items-center">
                            <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
                            </form>
                        </div>
                    </td>                
                </tr>
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
