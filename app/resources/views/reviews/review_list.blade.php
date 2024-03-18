@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-4">レビュー一覧</h2>

            <!-- レビュー一覧 -->
            <div class="row">
                @foreach ($reviews as $review)
                <div class="col-md-12"> 
                    <a href="{{ route('reviews.show', ['reviews'=>$review->id]) }}">
                        <div class="card mb-3">
                            <div class="card-body">
                                @if(isset($review->museum))
                                    <p>{{ $review->museum->name }}</p>
                                @endif
                                <h5 class="card-title">{{ $review->title }}</h5>
                                <p class="card-text">{{ $review->body }}</p>
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

            <!-- レビュー登録のボタン -->
            <div class="text-left mt-3">
                <a href="{{ route('reviews.create') }}" class="btn btn-primary float-start">レビュー登録</a>
            </div>
        </div>
    </div>
</div>
@endsection
