@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center"> <!-- 中央揃え -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">来訪歴編集</div>

                <div class="card-body">
                    <form action="{{ route('histories.update', $history->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3 justify-content-center"> <!-- 中央揃え -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">美術館名</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $history->museum->name ?? '' }}" required readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="date" class="form-label">訪問日</label>
                                    <input type="date" class="form-control" id="date" name="date" value="{{ $history->date }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="memo" class="form-label">メモ</label>
                                    <input type="text" class="form-control" id="memo" name="memo" value="{{ $history->memo }}" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <a href="{{ route('histories.show', $history->id) }}" class="btn btn-primary btn-block">戻る</a>
                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary btn-block">更新</button>
                            </div>

                            <!-- 削除ボタン -->
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger btn-block" data-bs-toggle="modal" data-bs-target="#deleteModal">
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
                本当にこの来訪歴を削除しますか？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                <form action="{{ route('histories.destroy', $history->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
