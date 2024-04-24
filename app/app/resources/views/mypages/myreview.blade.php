@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mt-3 mb-4">マイレビュー</h2>
            <!-- タブ -->
            <ul class="nav nav-tabs mb-4">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#liked_reviews">いいねしたレビュー</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#posted_reviews">投稿したレビュー</a>
                </li>
            </ul>

            <!-- タブのコンテンツ -->
            <div class="tab-content">
                <!-- いいねしたレビュー -->
                <div class="tab-pane fade" id="liked_reviews">
                    @foreach ($likedReviews as $likedReview)
                        <div class="card mb-3">
                            <div class="card-body">
                                @if ($likedReview->review) 
                                    <a href="{{ route('reviews.show', ['reviews' => $likedReview->review->id]) }}">
                                        <p class="card-title">{{ $likedReview->review->museum->name }}</p>
                                        <h5 class="card-title">{{ $likedReview->review->title }}</h5>
                                        <p class="card-text">{{ $likedReview->review->body }}</p>
                                    </a>
                                @else
                                    <p>いいねしたレビューはありません。</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- 投稿したレビュー -->
                <div class="tab-pane fade" id="posted_reviews">
                    @foreach ($postedReviews as $postedReview)
                        <div class="card mb-3">
                            <div class="card-body">
                                <a href="{{ route('reviews.show', ['reviews' => $postedReview->id]) }}">
                                    <p class="card-title">{{ $postedReview->museum->name }}</p>
                                    <h5 class="card-title">{{ $postedReview->title }}</h5>
                                    <p class="card-text">{{ $postedReview->body }}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
    <!-- 戻るボタン -->
    <div class="text-center mt-3">
        <a href="{{ route('mypages.index') }}" class="btn btn-primary">戻る</a>
    </div>
</div>
@endsection
