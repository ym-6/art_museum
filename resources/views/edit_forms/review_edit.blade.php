@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">レビュー編集</div>

                <div class="card-body">
                    <form action="{{ route('review.update', $review->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="prefecture" class="form-label">都道府県</label>
                            <p>{{ $review->prefecture }}</p>
                        </div>

                        <div class="mb-3">
                            <label for="review_title" class="form-label">レビュータイトル</label>
                            <input type="text" class="form-control" id="review_title" name="review_title" value="{{ $review->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="review_body" class="form-label">レビュー本文</label>
                            <textarea class="form-control" id="review_body" name="review_body" rows="5" required>{{ $review->text }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="criterion" class="form-label">評価</label>
                            <input type="number" class="form-control" id="criterion" name="criterion" value="{{ $review->criterion }}" required>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">更新</button>
                            </div>

                            <div class="col-md-3">
                                <a href="{{ route('review.detail') }}" class="btn btn-primary">戻る</a>
                            </div>

                            <!-- 削除ボタン -->
                            <div class="col-md-3">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    削除
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- ポップアップの削除確認モーダル -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">削除確認</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    本当にこのレビューを削除しますか？
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                                    <form action="{{ route('review.destroy', $review->id) }}" method="POST">
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
@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">レビュー編集</div>

                <div class="card-body">
                    <form action="{{ route('review.update', $review->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="prefecture" class="form-label">都道府県</label>
                            <p>{{ $review->prefecture }}</p>
                        </div>

                        <div class="mb-3">
                            <label for="review_title" class="form-label">レビュータイトル</label>
                            <input type="text" class="form-control" id="review_title" name="review_title" value="{{ $review->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="review_body" class="form-label">レビュー本文</label>
                            <textarea class="form-control" id="review_body" name="review_body" rows="5" required>{{ $review->text }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="criterion" class="form-label">評価</label>
                            <input type="number" class="form-control" id="criterion" name="criterion" value="{{ $review->criterion }}" required>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">更新</button>
                            </div>

                            <div class="col-md-3">
                                <a href="{{ route('review.detail') }}" class="btn btn-primary">戻る</a>
                            </div>

                            <!-- 削除ボタン -->
                            <div class="col-md-3">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    削除
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ポップアップの削除確認モーダル -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">削除確認</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                本当にこのレビューを削除しますか？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                <form action="{{ route('review.destroy', $review->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
