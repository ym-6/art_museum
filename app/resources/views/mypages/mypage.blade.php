@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">マイページ</div>

                <div class="card-body">
                    <div class="row">
                        <!-- 左側のカラム -->
                        <div class="col-md-6">
                            <h4><a href="{{ route('user_edit') }}">登録情報変更</a></h4>
                        </div>

                        <!-- 右側のカラム -->
                        <div class="col-md-6">
                            <h4><a href="{{ route('visit.history') }}">来訪歴</a></h4>
                            <h4><a href="{{ route('bookmark') }}">ブックマーク</a></h4>
                            <h4><a href="{{ route('myreview') }}">マイレビュー</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="{{ route('main') }}" class="btn btn-primary mt-3">戻る</a>
@endsection
