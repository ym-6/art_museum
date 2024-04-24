@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">美術館情報編集</div>

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

                    <form action="{{ route('museums.update', ['museum' => $museum->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">美術館名</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $museum->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="prefecture_id" class="form-label">都道府県</label>
                            <select class="form-select" id="prefecture_id" name="prefecture_id" required>
                                <option value="">都道府県を選択してください</option>
                                @foreach($prefectures as $prefecture)
                                    <option value="{{ $prefecture->id }}" @if($museum->prefecture_id == $prefecture->id) selected @endif>{{ $prefecture->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="postalcode" class="form-label">郵便番号</label>
                            <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ $museum->postalcode }}">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">都道府県以降の住所</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $museum->address }}">
                        </div>

                        <div class="mb-3">
                            <label for="tel" class="form-label">電話番号</label>
                            <input type="text" class="form-control" id="tel" name="tel" value="{{ $museum->tel }}">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">美術館画像</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @if($museum->image_url)
                                <img src="{{ asset($museum->image_url) }}" alt="美術館画像" class="mt-2" style="max-width: 200px;">
                            @endif
                        </div>

                        <div class="mb-3 justify-content-around">
                            <button type="submit" class="btn btn-primary">更新</button>
                            <a href="{{ route('museums.show', $museum->id) }}" class="btn btn-secondary">戻る</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">削除</button>
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
                本当にこの美術館を削除しますか？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                <form action="{{ route('museums.destroy', ['museum' => $museum->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
