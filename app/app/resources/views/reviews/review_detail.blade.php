<!-- CSRFトークンをmetaタグとして設定 -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Scripts -->
<script src="{{ asset('js/like.js') }}" defer></script>


@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-between">
    @auth
        <div class="fav">
            <!-- いいねされていない場合のアイコン -->
            <button class="like_icon" data-review-id="{{ $reviews->id }}" data-museum-id="{{ $reviews->museum->id }}">
                <img src="{{ asset('img/like1.jpeg') }}" alt="いいねする">
            </button>

            <!-- いいねされている場合のアイコン -->
            <button class="unlike_icon" data-review-id="{{ $reviews->id }}" data-museum-id="{{ $reviews->museum->id }}" style="display: none;">
                <img src="{{ asset('img/like2.jpeg') }}" alt="いいねを解除する">
            </button>
        </div>
    @endauth

    <!-- レビュー詳細 -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">レビュー詳細</div>
                <div class="review-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <p>{{ $reviews->museum->name }}</p>
                                    <h4 class="card-title">{{ $reviews->title }}</h4>
                                    <p>{!! nl2br(e($reviews->body)) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        @if(Auth::check() && (Auth::user()->is_admin == 1 || Auth::user()->id == $review->user_id))
                            <!-- 編集ボタン -->
                            <a href="{{ route('reviews.edit', ['reviews' => $reviews->id]) }}" class="btn btn-info mx-3">編集</a>
                        @endif
                    </div>
               </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-primary float-center">戻る</a>
        </div>
    </div>
</div>
@endsection
