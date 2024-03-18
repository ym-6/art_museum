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
                <div class="tab-pane fade show active" id="liked_reviews">
                    @foreach ($likedReviews as $likedReview)
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="card-title">{{ $likedReview->museum_name }}</p>
                            <h5 class="card-title">{{ $likedReview->review_title }}</h5>
                            <p class="card-text">
                                <a href="{{ route('review.detail', ['id' => $likedReview->id]) }}">
                                    {{ substr($likedReview->review_body, 0, 50) }}{{ strlen($likedReview->review_body) > 50 ? "..." : "" }}
                                </a>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- 投稿したレビュー -->
                <div class="tab-pane fade" id="posted_reviews">
                    @foreach ($postedReviews as $postedReview)
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="card-title">{{ $postedReview->museum_name }}</p>
                            <h5 class="card-title">{{ $postedReview->review_title }}</h5>
                            <p class="card-text">
                                <a href="{{ route('review.detail', ['id' => $postedReview->id]) }}">
                                    {{ substr($postedReview->review_body, 0, 50) }}{{ strlen($postedReview->review_body) > 50 ? "..." : "" }}
                                </a>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- 戻るボタン -->
    <div class="text-center mt-3">
        <a href="{{ route('mypage') }}" class="btn btn-primary">戻る</a>
    </div>
</div>
@endsection
