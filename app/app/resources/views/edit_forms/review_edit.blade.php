@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">レビュー編集</div>
                
                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                <div class="card-body">
                    <form action="{{ route('reviews.update', ['reviews' => $reviews->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">美術館名</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $reviews->museum->name ?? '' }}" required readonly>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">レビュータイトル</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $reviews->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="body" class="form-label">レビュー本文</label>
                            <textarea class="form-control" id="body" name="body" rows="5" required>{{ $reviews->body }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="criterion" class="form-label">評価</label>
                            <select class="form-select" id="criterion" name="criterion">
                                <option value="0" {{ $reviews->criterion == 0 ? 'selected' : '' }}>◯</option>
                                <option value="1" {{ $reviews->criterion == 1 ? 'selected' : '' }}>△</option>
                            </select>
                        </div>

                        <div class="row justify-content-center">
                        <div class="mb-3 justify-content-around">
                            <button type="submit" class="btn btn-primary">更新</button>
                            <a href="{{ route('reviews.show', $reviews->id) }}" class="btn btn-secondary">戻る</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">削除</button>
                        </div>                    
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
                                    <form action="{{ route('reviews.destroy', $reviews->id) }}" method="POST">
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
