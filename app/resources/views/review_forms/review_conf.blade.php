@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">レビュー登録確認</div>

                <div class="card-body">
                    <div class="mb-3">
                        <label for="museum" class="form-label">美術館名</label>
                        <p>{{ isset($data['name']) ? $data['name'] : '_' }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">レビュータイトル</label>
                        <p>{{ isset($data['title']) ? $data['title'] : '_' }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="review_body" class="form-label">レビュー本文</label>
                        <p>{{ isset($data['body']) ? $data['body'] : '_' }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="criterion" class="form-label">評価</label>
                        <p>{{ isset($data['criterion']) ? ($data['criterion'] == 0 ? '◯' : '△') : '' }}</p>
                    </div>

                    <div class="row">
                        <form class="col-md-6" action="{{ route('reviews.comp') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="name" value="{{ session('review_data.name') ?? '_' }}">
                            <input type="hidden" name="museum_id" value="{{ session('review_data.museum_id') ?? '_' }}">
                            <input type="hidden" name="title" value="{{ session('review_title') ?? '_' }}">
                            <input type="hidden" name="body" value="{{ session('review_body') ?? '_' }}">
                            <input type="hidden" name="rating" value="{{ $data['criterion'] ?? '' }}">
                            <input type="hidden" name="criterion" value="{{ session('review_criterion') ?? '_' }}">
                            <button type="submit" class="btn btn-primary">登録</button>
                        </form>

                        <div class="col-md-6">
                            <a href="{{ route('reviews.create') }}" class="btn btn-secondary">戻る</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
