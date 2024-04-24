<!-- CSRFトークンをmetaタグとして設定 -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Scripts -->
<script src="{{ asset('js/bookmark.js') }}" defer></script>

@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-between">
        @auth
            <div class="fav">
                <!-- ブックマークされていない場合のアイコン -->
                <button class="favorite_icon" data-id="{{ $museum->id }}">
                    <img src="{{ asset('img/fav1.jpeg') }}" alt="ブックマークする">
                </button>

                <!-- ブックマークされている場合のアイコン -->
                <button class="unfavorite_icon" data-id="{{ $museum->id }}" style="display: none;">
                    <img src="{{ asset('img/fav2.jpeg') }}" alt="ブックマークを解除する">
                </button>
            </div>
        @endauth

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2 class="mb-0">{{ $museum->name }}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- 画像を表示 -->
                        @if($image)
                            <div class="col-md-4">
                                <img src="{{ asset('/storage/' .$image->image_path) }}" class="img-fluid mb-3" alt="{{ $image->museum->name }}" id="image{{ $image->id }}">
                            </div>
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
