@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-4">美術館一覧</h2>

        <!-- 検索フォーム -->
        <form action="{{ route('museums.index') }}" method="GET" class="mb-4">
            <div class="row justify-content-center">
                <!-- 都道府県検索 -->
                <div class="col-md-3 mb-3">
                    <select class="form-select" id="prefecture_id" name="prefecture_id">
                        <option value="">都道府県を選択してください</option>
                        @isset($prefectures)
                            @foreach($prefectures as $prefecture)
                                <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>
                <!-- キーワード検索 -->
                <div class="col-md-4 mb-2">
                    <input type="text" name="keyword" id="keyword" class="form-control" placeholder="キーワードを入力してください">
                </div>
                <!-- 検索ボタン -->
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">検索</button>
                </div>
            </div>
        </form>

            <!-- 美術館情報を表示 -->
            <div class="row">
                @foreach ($museums as $museum)
                <div class="col-md-12"> 
                    <a href="{{ route('museums.show', $museum -> id) }}">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $museum -> name }}</h5>
                                <p class="address">                    
                                    @if ($museum -> prefecture)
                                        {{ $museum -> prefecture -> name }}
                                    @else
                                        非設定
                                    @endif 
                                </p>
                                <p class="address"> {{ $museum -> address }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            
            <!-- ページ遷移 -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <!-- ページ数を表示 -->
                    @for ($i = 1; $i <= $pageCount; $i++)
                        <li class="page-item"><a class="page-link" href="#">{{ $i }}</a></li>
                    @endfor
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- 美術館登録のボタン -->
            <div class="text-left mt-3">
                <a href="{{ route('museums.create') }}" class="btn btn-primary float-start">美術館登録</a>
            </div>

        </div>
    </div>
</div>
@endsection
