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

    <!-- TOPに戻るボタン -->
    <div class="row mt-4" id="topButtonRow">
        <div class="col-md-12 text-left">
            <button onclick="topFunction()" class="btn btn-primary">TOPに戻る</button>
        </div>
    </div>
</div>
@endsection

<script>
    var imagePaths = [
        "{{ asset('/img/27409714_s.jpg') }}",
        "{{ asset('/img/28873208_s.jpg') }}",
        "{{ asset('/img/28942553_s.jpg') }}",
        "{{ asset('/img/29028774_s.jpg') }}"
    ];

    // 現在の画像のインデックスを追跡します
    var currentImageIndex = 0;

    // メイン画像のsrc属性を更新する関数
    function updateMainImage() {
        var mainImage = document.getElementById('main');
        mainImage.style.opacity = 0; // フェードインのために透明度を0に設定
        mainImage.src = imagePaths[currentImageIndex];
        // フェードイン効果を実行
        fadeIn(mainImage);
    }

    // 画像を切り替える関数
    function changeImage(direction) {
        currentImageIndex += direction;
        // インデックスが画像の範囲外にならないようにします
        if (currentImageIndex < 0) {
            currentImageIndex = imagePaths.length - 1;
        } else if (currentImageIndex >= imagePaths.length) {
            currentImageIndex = 0;
        }
        // メイン画像を更新します
        updateMainImage();
    }

    // フェードイン効果を実行する関数
    function fadeIn(element) {
        var opacity = 0;
        var intervalId = setInterval(function() {
            if (opacity < 1) {
                opacity += 0.1;
                element.style.opacity = opacity;
            } else {
                clearInterval(intervalId);
            }
        }, 50); // フェードインの速度を調整するための時間間隔
    }
</script>

<script>
// ページが読み込まれた時に実行
window.onload = function() {
  // ボタン要素を取得
  var topButtonRow = document.getElementById("topButtonRow");
  // 初期位置を設定
  topButtonRow.style.bottom = "20px";
  topButtonRow.style.right = "20px";
  // ボタンが画面をスクロールすると表示/非表示を切り替える
  window.onscroll = function() {
    scrollFunction(topButtonRow);
  };
};

function scrollFunction(topButtonRow) {
  if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
    // スクロールが10以上の場合、ボタンを表示
    topButtonRow.style.display = "block";
  } else {
    // スクロールが10以下の場合、ボタンを非表示
    topButtonRow.style.display = "none";
  }
}

// ボタンをクリックするとTOPに戻る
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
