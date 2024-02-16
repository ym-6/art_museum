@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">レビュー情報編集</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- 美術館の画像 -->
                            <img src="{{ $review->museum->image_url }}" class="img-fluid" alt="{{ $review->museum->museum_name }}">
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <p>{{ $review->museum->museum_name }}</p>
                                    <h2>タイトル: {{ $review->title }}</h2>
                                    <p>本文: {{ $review->body }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <!-- 戻るボタン -->
                        <a href="{{ route('review.list') }}" class="btn btn-primary">戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
