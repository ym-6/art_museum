@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <!-- 検索フォーム -->
            <form action="{{ route('histories.index') }}" method="GET" class="mb-4">
                <div class="row align-items-center">
                    <div class="col-md-4 mb-3">
                        <label for="start_date" class="form-label">開始日:</label>
                        <input type="date" id="start_date" name="start_date" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="end_date" class="form-label">終了日:</label>
                        <input type="date" id="end_date" name="end_date" class="form-control">
                    </div>
                    <div class="col-md-4 mt-3">
                        <button type="submit" class="btn btn-primary me-2">検索</button>
                        <!-- 新規作成ボタン -->
                        <a href="{{ route('histories.create') }}" class="btn btn-success">新規作成</a>
                    </div>
                </div>
            </form>

            <h2 class="text-center mb-4">来訪歴一覧</h2>
            
            <!-- 来訪歴を繰り返し表示 -->
            @foreach ($histories as $history)
                <div class="col-md-12"> 
                    <a href="{{ route('histories.show', ['histories' => $history->id]) }}">
                        <div class="card mb-3">
                            <div class="card-body">
                                @if ($history->museum)
                                    <p>{{ $history->museum->name }}</p>
                                @endif
                                <h5 class="card-title">来訪日: {{ $history->date }}</h5>
                                <p class="card-text">メモ: {{ $history->memo }}</p>
                            </div>
                        </div>
                    </a>
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
