@extends('layouts.navlayout')

@section('content')
<div class="container">
    <!-- いいねボタン -->
    <div class="text-end mb-3">
        <button class="btn btn-primary" id="favoriteButton">
            <img src="{{ asset('storage/nice1.jpeg') }}" alt="お気に入り" id="favoriteIcon">
        </button>
    </div>

    <!-- レビュー詳細 -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">レビュー詳細</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                @if ($reviews)
                                    <p class="card-title">{{ $reviews -> museum ? $reviews -> museum -> name : '未設定' }}</p>
                                @else
                                    <p class="card-title">美術館情報がありません</p>
                                @endif                                    
                                    <h4> {{ $reviews -> title }}</h4>
                                    <p> {{ $reviews -> text }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                このレビューを削除してもよろしいですか？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                <!-- 削除リンク -->
                <a href="{{ route('reviews.index') }}" class="btn btn-danger">削除する</a>
            </div>
        </div>
    </div>
</div>

<script>
    // いいねボタンのクリックイベントを処理する
    document.getElementById('niceButton').addEventListener('click', function() {
        // 仮に非同期処理が成功した場合、いいねアイコンの画像を切り替える
        var icon = document.getElementById('niceIcon');
        // いいねの状態によって画像を切り替える
        if (icon.src.includes('nice1.jpeg')) {
            // いいねに追加済みの状態の場合、画像2に切り替える
            icon.src = "{{ asset('storage/nice2.jpeg') }}";
        } else {
            // いいねに未追加の状態の場合、画像1に切り替える
            icon.src = "{{ asset('storage/nice1.jpeg') }}";
        }
    });
</script>

@endsection
