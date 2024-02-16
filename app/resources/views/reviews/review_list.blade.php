@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- 検索フォーム -->
            <form action="{{ route('museum.search') }}" method="GET" class="mb-4">
                <div class="row">
                    <div class="col-md-8">
                        <select name="category" id="category" class="form-select">
                            <!-- オプションを追加 -->
                            <option value="1">都道府県</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">検索</button>
                    </div>
                </div>
            </form>

            <h2>レビュー一覧</h2>
            
            <!-- レビューを繰り返し表示 -->
            @for ($i = 0; $i < 30; $i++)
                <div class="card mb-3">
                    <div class="card-body">
                        <!-- レビューの情報を表示 -->
                        <p class="card-title">美術館名</p>
                        <h5 class="card-title">レビュータイトル</h5>
                        <!-- レビュー文の最初の50文字だけ表示 -->
                        <p class="card-text">
                            <a href="{{ route('review.detail', ['id' => $review->id]) }}">
                                {{ substr($review->body, 0, 50) }}{{ strlen($review->body) > 50 ? "..." : "" }}
                            </a>
                        </p>
                    </div>
                </div>
            @endfor
            
            <!-- ページ遷移 -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <!-- ページ数を表示 -->
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
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
