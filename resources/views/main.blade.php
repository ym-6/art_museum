@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- メイン画像 -->
            <img src="{{ asset('path_to_your_main_image.jpg') }}" alt="メイン画像" class="img-fluid" id="main">
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <h4>Museums</h4>
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
            <h4>Reviews</h4>
            <div class="row">
                @foreach ($reviews as $review)
                <div class="col-md-6">
                    <a href="{{ route('reviews.show', $review->id) }}">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $review -> title }}</h5>
                                <p class="card-text">{{ $review -> text }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <a href="{{ route('reviews.index') }}" class="btn btn-primary float-end">レビュー一覧</a>
        </div>
    </div>

    <!-- TOPに戻るボタン -->
    <div class="row mt-4" id="topButtonRow">
        <div class="col-md-12 text-center">
            <button onclick="topFunction()" class="btn btn-primary">TOPに戻る</button>
        </div>
    </div>
</div>
@endsection

<script>
// ボタンが画面をスクロールすると表示/非表示を切り替える
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("topButtonRow").style.display = "block";
  } else {
    document.getElementById("topButtonRow").style.display = "none";
  }
}

// ボタンをクリックするとTOPに戻る
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
