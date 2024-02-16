@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>ブックマーク一覧</h2>
            
            <!-- ブックマークされた美術館情報を繰り返し表示 -->
            @foreach ($bookmarkedMuseums as $museum)
                <div class="card mb-3">
                    <div class="card-body">
                        <!-- 美術館の情報を表示 -->
                        <h5 class="card-title"><a href="{{ route('museum.detail', ['id' => $museum->id]) }}">{{ $museum->museum_name }}</a></h5>
                        <p class="card-text">{{ $museum->museum_address }}</p>
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
    <!-- 戻るボタン -->
    <div class="text-center mt-3">
        <a href="{{ route('mypage') }}" class="btn btn-primary">戻る</a>
    </div>
</div>
@endsection
