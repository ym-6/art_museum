@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-4">ブックマーク一覧</h2>
            <div class="row">
                @foreach ($museums as $museum)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="{{ $museum->image_url }}" class="card-img-top" alt="{{ $museum->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $museum->name }}</h5>
                            <p class="card-text">{{ $museum->prefecture }}</p>
                            <a href="{{ route('museum.detail', $museum->id) }}" class="btn btn-primary">詳細を見る</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('mypages.index') }}" class="btn btn-primary">戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection
