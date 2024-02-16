@extends('layouts.navlayout')

@section('content')
<div class="container">
    <!-- お気に入りボタン -->
    <div class="text-end mb-3">
        <button class="btn btn-primary" id="favoriteButton">
            <img src="{{ asset('path/to/heart_icon.png') }}" alt="お気に入り">
        </button>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ $museum->museum_name }}</div>

                <div class="card-body">
                    <div class="mb-3 text-center">
                        <img src="{{ $museum->image_url }}" class="img-fluid mb-3" alt="{{ $museum->museum_name }}">
                    </div>

                    <form action="{{ route('museum.update', $museum->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="postal_code" class="form-label">郵便番号</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ $museum->postal_code }}" required readonly>
                        </div>

                        <div class="mb-3">
                            <label for="prefecture" class="form-label">都道府県</label>
                            <input type="text" class="form-control" id="prefecture" name="prefecture" value="{{ $museum->prefecture }}" required readonly>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">住所</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $museum->address }}" required readonly>
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">電話番号</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $museum->phone_number }}" required readonly>
                        </div>

                        <div class="mb-3">
                            <!-- レビューボタン（小さく） -->
                            <a href="{{ route('review.reg') }}" class="btn btn-primary btn-sm">レビューを書く</a>
                        </div>

                        <button type="submit" class="btn btn-primary">更新</button>
                    </form>
                    
                    <!-- 削除ボタン -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        削除
                    </button>

                    <!-- ポップアップの削除確認モーダル -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">削除確認</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    本当にこの美術館を削除しますか？
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                                    <form action="{{ route('museum.destroy', $museum->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">削除</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 戻るボタン -->
    <a href="{{ route('museum.list') }}" class="btn btn-primary mt-3">戻る</a>
</div>

<script>
    // お気に入りボタンのクリックイベントを処理する
    document.getElementById('favoriteButton').addEventListener('click', function() {
        // ここにお気に入りボタンをクリックした際の非同期通信処理
    });
</script>
@endsection
