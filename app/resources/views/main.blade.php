@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- メイン画像 -->
            <img src="path_to_your_main_image.jpg" alt="メイン画像" class="img-fluid">
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <h2>美術館</h2>
            <div class="row">
                @foreach ($artMuseums as $artMuseum)
                <div class="col-md-6">
                    <a href="{{ route('museum.detail', $ArtMuseums->id) }}">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $ArtMuseums->name }}</h5>
                                <p class="card-text">{{ $ArtMuseums->text }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <a href="{{ route('museum.list') }}" class="btn btn-primary">美術館一覧</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <h2>最新のレビュー</h2>
            <div class="row">
                @foreach ($reviews as $review)
                <div class="col-md-6">
                    <a href="{{ route('review.detail', $review->id) }}">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $reviews->name }}</h5>
                                <p class="card-text">{{ $reviews->text }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <a href="{{ route('review.list') }}" class="btn btn-primary">レビュー一覧</a>
        </div>
    </div>
</div>
@endsection
