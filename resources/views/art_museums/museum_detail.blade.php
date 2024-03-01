@extends('layouts.navlayout')

@section('content')
<div class="container">
    <!-- お気に入りボタン -->
    <div class="text-end mb-3">
        <button class="btn btn-primary" id="favoriteButton">
            <img src="{{ asset('storage/fav1.jpeg') }}" alt="お気に入り" id="favoriteIcon">
        </button>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2 class="mb-0">{{ $museums -> name }}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset($museums ->image_url) }}" class="img-fluid mb-3" alt="{{ $museums -> name }}">
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item">〒{{ $museums -> postalcode }}</li>
                                @if ($museums)
                                <li class="list-group-item">{{ $museums -> prefecture ? $museums -> prefecture -> name : '未設定' }}{{ $museums -> address }}</li>
                                @else
                                <li class="list-group-item">美術館情報が見つかりません</li>
                                @endif
                                <li class="list-group-item">{{ $museums -> tel }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        @if(Auth::check() && Auth::user()->is_admin == 1)
                            <a href="{{ route('museum.edit') }}" class="btn btn-info mx-2">編集</a>
                            <button type="button" class="btn btn-danger float-end" data-toggle="modal" data-target="#confirmDelete">削除</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
            <div class="text-center mt-4">
                <a href="{{ url()->previous() }}" class="btn btn-primary float-start">戻る</a>
            </div>
    </div>
</div>

<!-- ポップアップの削除確認モーダル -->
<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteLabel">削除の確認</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                この美術館を削除してもよろしいですか？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                <!-- 削除リンク -->
                <a href="{{ route('museums.index') }}" class="btn btn-danger">削除する</a>
            </div>
        </div>
    </div>
</div>

<script>
    // お気に入りボタンのクリックイベントを処理する
    document.getElementById('favoriteButton').addEventListener('click', function() {
        // ここにお気に入りの非同期通信処理を記述
        // 仮に非同期処理が成功した場合、お気に入りアイコンの画像を切り替える
        var icon = document.getElementById('favoriteIcon');
        // お気に入りの状態によって画像を切り替える
        if (icon.src.includes('fav1.jpeg')) {
            // お気に入りに追加済みの状態の場合、画像2に切り替える
            icon.src = "{{ asset('storage/fav2.jpeg') }}";
        } else {
            // お気に入りに未追加の状態の場合、画像1に切り替える
            icon.src = "{{ asset('storage/fav1.jpeg') }}";
        }
    });
</script>
@endsection
