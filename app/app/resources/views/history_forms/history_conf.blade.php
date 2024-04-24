@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">来訪歴登録確認</div>

                <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">美術館名</label>
                    <p>{{ isset($data['name']) ? $data['name'] : '_' }}</p>
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">訪問日</label>
                    <p>{{ isset($data['date']) ? $data['date'] : '_' }}</p>
                </div>

                <div class="mb-3">
                    <label for="memo" class="form-label">メモ</label>
                    <p>{{ isset($data['memo']) ? $data['memo'] : '_' }}</p>
                </div>

                    <form action="{{ route('histories.comp') }}" method="POST">
                        @csrf
                        <!-- データを隠しフィールドとして送信 -->
                        <input type="hidden" name="name" value="{{ session('history_data.name') ?? '_' }}">
                        <input type="hidden" name="museum_id" value="{{ session('history_data.museum_id') ?? '_' }}">
                        <input type="hidden" name="date" value="{{ session('history_data.date') ?? '_' }}">
                        <input type="hidden" name="memo" value="{{ session('history_data.memo') ?? '_' }}">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </form>

                    <a href="{{ route('histories.create') }}" class="btn btn-secondary">戻る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
