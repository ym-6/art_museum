@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">来訪歴登録確認</div>

                <div class="card-body">
                    <div class="mb-3">
                        <label for="museum_name" class="form-label">美術館名</label>
                        <input type="text" class="form-control" id="museum_name" name="museum_name" value="{{ $museum_name }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="visit_date" class="form-label">訪問日</label>
                        <input type="text" class="form-control" id="visit_date" name="visit_date" value="{{ $visit_date }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="memo" class="form-label">メモ</label>
                        <textarea class="form-control" id="memo" name="memo" rows="5" readonly>{{ $memo }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">画像</label>
                        <!-- 画像表示 -->
                        <img src="{{ $image }}" class="img-fluid" alt="画像">
                    </div>

                    <form action="{{ route('history_comp') }}" method="POST">
                        @csrf
                        <!-- データを隠しフィールドとして送信 -->
                        <input type="hidden" name="museum_name" value="{{ $museum_name }}">
                        <input type="hidden" name="visit_date" value="{{ $visit_date }}">
                        <input type="hidden" name="memo" value="{{ $memo }}">
                        <input type="hidden" name="image" value="{{ $image }}">
                        
                        <button type="submit" class="btn btn-primary">登録</button>
                    </form>

                    <a href="{{ route('history_edit') }}" class="btn btn-secondary">戻る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
