@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">来訪歴編集</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- 美術館の画像 -->
                            <img src="{{ $visitHistory->museum->image_url }}" class="img-fluid" alt="{{ $visitHistory->museum->museum_name }}">
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <p>{{ $visitHistory->museum->museum_name }}</p>
                                    <p>訪問日: {{ $visitHistory->visit_date }}</p>
                                    <p>メモ: {{ $visitHistory->memo }}</p>
                                    <!-- 画像の登録欄 -->
                                    <div class="mb-3">
                                        <label for="image" class="form-label">画像を選択してください</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <!-- ボタン -->
                        <a href="{{ route('history_list') }}" class="btn btn-primary">戻る</a>
                        <a href="{{ route('history_edit') }}" class="btn btn-info">更新</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
