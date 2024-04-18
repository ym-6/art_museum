<!-- Scripts -->
<script src="{{ asset('js/main.js') }}" defer></script>


@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="main_img">
        <!-- メイン画像 -->
        <img src="{{ asset('/img/27409714_s.jpg') }}" alt="メイン画像" class="img-fluid" id="main">
            <div class="arrow">
            <!-- 左矢印 -->
            <div class="left-arrow" onclick="changeImage(-1)">&#10094;</div>
            <!-- 右矢印 -->
            <div class="right-arrow" onclick="changeImage(1)">&#10095;</div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="maintitle"><h2>Museums</h2></div>
            <div class="row">
                @foreach ($museums as $museum)
                <div class="col-md-6">
                    <a href="{{ route('museums.show', $museum -> id) }}">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $museum -> name }}</h5>
                                <p class="address">                    
                                    @if ($museum -> prefecture)
                                        {{ $museum -> prefecture -> name }}
                                    @else
                                        非設定
                                    @endif 
                                </p>
                                <p class="address">{{ $museum -> address }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <a href="{{ route('museums.index') }}" class="btn btn-primary float-end">美術館一覧</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="maintitle"><h2>Reviews</h2></div>
            <div class="row">
                @foreach ($reviews as $review)
                <div class="col-md-6">
                    <a href="{{ route('reviews.show', $review->id) }}">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $review -> title }}</h5>
                                <p class="card-text">{{ $review -> body }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <a href="{{ route('reviews.index') }}" class="btn btn-primary float-end">レビュー一覧</a>
        </div>
    </div>

</div>
@endsection

