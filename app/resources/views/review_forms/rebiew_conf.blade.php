@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">レビュー登録確認</div>

                <div class="card-body">
                    <div class="mb-3">
                        <label for="museum" class="form-label">美術館名</label>
                        <!-- DBから取得した美術館名を表示 -->
                        <p>{{ $museum }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="review_title" class="form-label">レビュータイトル</label>
                        <p>{{ $review_title }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="review_body" class="form-label">レビュー本文</label>
                        <p>{{ $review_body }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="rating" class="form-label">評価</label>
                        <p>{{ $rating }}</p>
                    </div>

                    <form action="{{ route('review.comp') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="museum" value="{{ $museum }}">
                        <input type="hidden" name="review_title" value="{{ $review_title }}">
                        <input type="hidden" name="review_body" value="{{ $review_body }}">
                        <input type="hidden" name="rating" value="{{ $rating }}">

                        <button type="submit" class="btn btn-primary">登録</button>
                    </form>
                    
                    <a href="{{ route('review.reg') }}" class="btn btn-secondary">戻る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
