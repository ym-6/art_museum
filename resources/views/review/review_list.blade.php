@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-4">レビュー一覧</h2>

            <!-- 検索フォーム -->
            <form action="{{ route('reviews.index') }}" method="GET" class="mb-4">
                <div class="row justify-content-center">
                    <!-- 都道府県検索 -->
                    <div class="col-md-3 mb-3">
                        <select name="prefecture" id="prefecture" class="form-select">
                            <option value="">都道府県を選択してください</option>
                            <!-- 都道府県オプション -->
                        </select>
                    </div>
                    <!-- 検索ボタン -->
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">検索</button>
                    </div>
                </div>
            </form>

            <!-- 美術館情報を表示 -->
            <div class="row">
                @foreach ($reviews as $review)
                <div class="col-md-12"> 
                    <a href="{{ route('reviews.show', $review -> id) }}">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $review -> name }}</h5>
                                <p class="name">                    
                                    @if ($review -> museum)
                                        {{ $review -> museum -> name }}
                                    @else
                                        非設定
                                    @endif 
                                </p>
                                <p class="card-text">{{ $review -> text }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            
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
