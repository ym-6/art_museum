@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">美術館登録確認</div>

                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">美術館名</label>
                        <p>{{ isset($data['name']) ? $data['name'] : '_' }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="postalcode" class="form-label">郵便番号</label>
                        <p>{{ isset($data['postalcode']) ? $data['postalcode'] : '_' }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="prefecture" class="form-label">都道府県</label>
                        <p>{{ isset($prefecture) ? $prefecture : '_' }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">住所</label>
                        <p>{{ isset($data['address']) ? $data['address'] : '_' }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="tel" class="form-label">電話番号</label>
                        <p>{{ isset($data['tel']) ? $data['tel'] : '_' }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">美術館画像</label>
                        @if(isset($image))
                            <img src="{{ asset('storage/' . $image) }}" class="img-fluid" alt="{{ isset($data['image']) ? $data['image'] : ''}}">
                        @else
                            <p>画像がありません</p>
                        @endif
                    </div>

                    <div class="row">
                        <form class="col-md-6" action="{{ route('museums.comp') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="name" value="{{ session('museum_data.name') ?? '_' }}">
                            <input type="hidden" name="postalcode" value="{{ session('museum_postalcode') ?? '_' }}">
                            <input type="hidden" name="prefecture_id" value="{{ session('museum_data.prefecture_id') ?? '_' }}">
                            <input type="hidden" name="address" value="{{ session('museum_address') ?? '_' }}">
                            <input type="hidden" name="tel" value="{{ session('museum_tel') ?? '_' }}">
                            <input type="hidden" name="image" value="{{ session('image') ?? '_' }}">
                            <button type="submit" class="btn btn-primary">登録</button>
                        </form>

                        <div class="col-md-6">
                            <a href="{{ route('museums.create') }}" class="btn btn-secondary">戻る</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
