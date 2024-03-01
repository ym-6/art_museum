@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- 検索フォーム -->
            <form action="{{ route('visit_history.search') }}" method="GET" class="mb-4">
                <div class="row">
                    <div class="col-md-8">
                        <label for="date" class="form-label">日付</label>
                        <input type="date" id="date" name="date" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">検索</button>
                        <!-- 新規作成ボタン -->
                        <a href="{{ route('history_reg') }}" class="btn btn-success">新規作成</a>
                    </div>
                </div>
            </form>

            <h2>来訪歴一覧</h2>
            
            <!-- 来訪歴を繰り返し表示 -->
            @foreach ($visitHistories as $visitHistory)
                <div class="card mb-3">
                    <div class="card-body">
                        <!-- 美術館の情報を表示 -->
                        <h5 class="card-title"><a href="{{ route('history_detail', ['id' => $visitHistory->id]) }}">{{ $visitHistory->museum->museum_name }}</a></h5>
                        <!-- 美術館の画像を表示 -->
                        <img src="{{ $visitHistory->museum->image_url }}" class="img-fluid" alt="{{ $visitHistory->museum->museum_name }}">
                    </div>
                </div>
            @endforeach
            
            <!-- ページ遷移 -->
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
