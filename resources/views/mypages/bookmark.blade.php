@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>ブックマーク一覧</h2>
                <!-- ブックマークされた美術館情報を繰り返し表示 -->
                <div class="row">
                    @foreach ($bookmars as $museum)
                    <div class="col-md-6">
                        <a href="{{ route('museum.detail', $museum->art_museums_id) }}">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $museum->museum->name }}</h5>
                                    <p class="card-text">{{ $museum->museum->prefecture }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <!-- ページネーションリンクを表示 -->
                {{ $bookmarks->links() }}
            <!-- 戻るボタン -->
            <div class="text-center mt-3">
                <a href="{{ route('mypage') }}" class="btn btn-primary">戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection
