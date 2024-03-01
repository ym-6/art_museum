@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">来訪歴登録完了</div>

                <div class="card-body">
                    <p class="text-center">登録が完了しました</p>
                    <div class="text-center">
                        <a href="{{ route('history.list') }}" class="btn btn-primary">戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
