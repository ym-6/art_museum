@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">来訪歴詳細</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12"> 
                            @if(isset($history))
                                <div class="card mb-3">
                                    <div class="card-body">
                                        @if(isset($history->museum))
                                            <p>{{ $history->museum->name }}</p>
                                        @endif
                                        <h5 class="card-title">来訪日: {{ $history->date }}</h5>
                                        <p class="card-text">メモ: {{ $history->memo }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mt-3 text-center">
                        <!-- ボタン -->
                        <a href="{{ route('histories.index') }}" class="btn btn-primary">戻る</a>
                        @if(isset($history))
                            <a href="{{ route('histories.edit', ['histories' => $history->id]) }}" class="btn btn-info">編集</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
