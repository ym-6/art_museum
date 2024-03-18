<!-- CSRFトークンをmetaタグとして設定 -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Scripts -->
<script src="{{ asset('js/like.js') }}" defer></script>


@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-between">
        <!-- お気に入りアイコンを表示 -->
        <div class="nice">
            @auth
            <img src="{{ asset('img/nice1.jpeg') }}" alt="お気に入り" id="likeIcon" data-museum-id="{{ $museum->id }}">
            @endauth
        </div>
    </div>

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

@push('scripts')
<script>
    // お気に入りアイコンのクリックイベントを処理する
    document.getElementById('niceIcon').addEventListener('click', function() {
        // ここにお気に入りの非同期通信処理を記述
        // 仮に非同期処理が成功した場合、お気に入りアイコンの画像を切り替える
        var icon = document.getElementById('niceIcon');
        // お気に入りの状態によって画像を切り替える
        if (icon.src.includes('nice1.jpeg')) {
            // お気に入りに追加済みの状態の場合、画像2に切り替える
            icon.src = "{{ asset('img/nice2.jpeg') }}";
        } else {
            // お気に入りに未追加の状態の場合、画像1に切り替える
            icon.src = "{{ asset('img/nice1.jpeg') }}";
        }
    });
</script>
@endpush
