@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">美術館情報編集</div>

                <div class="card-body">
                    <form action="{{ route('museum.update', $museum->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="museum_name" class="form-label">美術館名</label>
                            <input type="text" class="form-control" id="museum_name" name="museum_name" value="{{ $museum->museum_name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="postal_code" class="form-label">郵便番号</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ $museum->postal_code }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="prefecture" class="form-label">都道府県</label>
                            <select class="form-select" id="prefecture" name="prefecture" required>
                                <!-- 都道府県のプルダウンメニュー -->
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">住所</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $museum->address }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">電話番号</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $museum->phone_number }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">美術館画像</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <img src="{{ $museum->image_url }}" class="img-fluid mt-2" alt="{{ $museum->museum_name }}">
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
</div>
@endsection
