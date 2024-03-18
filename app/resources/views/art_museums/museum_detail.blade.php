<!-- CSRFトークンをmetaタグとして設定 -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Scripts -->
<script src="{{ asset('js/.js') }}" defer></script>

@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-between">
        <!-- お気に入りアイコンを表示 -->
        <div class="fav">
            @auth
            <img src="{{ asset('img/fav1.jpeg') }}" alt="お気に入り" id="favoriteIcon" data-museum-id="{{ $museum->id }}">
            @endauth
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2 class="mb-0">{{ $museum->name }}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- 画像を表示 -->
                        @if($images->isNotEmpty())
                            @foreach($images as $image)
                                <div class="col-md-4">
                                    <img src="{{ asset($image->path) }}" class="img-fluid mb-3" alt="{{ $museum->name }}" id="image{{ $image->id }}">
                                </div>
                            @endforeach
                        @else
                        <!-- 画像が保存されていない場合、デフォルト画像を表示 -->
                            <div class="col-md-4">
                                <img src="{{ asset('/img/m_e_others_501.png') }}" class="img-fluid mb-3" alt="デフォルト画像" id="defaultImage">
                            </div>
                        @endif                        
                        <!-- その他の情報を表示 -->
                        <div class="col-md-8">
                            <ul class="list-group">
                                <li class="list-group-item">〒{{ $museum->postalcode }}</li>
                                <li class="list-group-item">住所：{{ $museum->prefecture ? $museum->prefecture->name : '未設定' }}{{ $museum->address }}</li>
                                <li class="list-group-item">電話番号：{{ $museum->tel }}</li>
                            </ul>
                            <div class="text-center mt-3">
                                @if(Auth::check() && (Auth::user()->is_admin == 1 || Auth::user()->id == $museum->user_id))
                                    <!-- 編集ボタン -->
                                    <a href="{{ route('museums.edit', ['museum' => $museum->id]) }}" class="btn btn-info mx-3">編集</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-primary float-center">戻る</a>
        </div>
    </div>
</div>

@endsection
