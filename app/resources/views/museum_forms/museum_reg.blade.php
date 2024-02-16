@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">美術館登録</div>

                <div class="card-body">
                    <form action="{{ route('museum.conf') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="museum_name" class="form-label">美術館名</label>
                            <input type="text" class="form-control" id="museum_name" name="museum_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="prefecture" class="form-label">都道府県</label>
                            <select class="form-select" id="prefecture" name="prefecture" required>
                                <!-- 都道府県のプルダウンメニュー -->
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">住所</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">電話番号</label>
                            <input type="text" class="form-control" id="tel" name="tel" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">美術館画像</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <button type="submit" class="btn btn-primary">確認</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
