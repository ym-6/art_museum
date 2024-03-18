@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">美術館登録</div>

                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('museums.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">美術館名</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        </div>

                        <div class="mb-3">
                            <label for="prefecture_id" class="form-label">都道府県</label>
                            <select class="form-select" id="prefecture_id" name="prefecture_id" required>
                                <option value="">都道府県を選択してください</option>
                                @foreach($prefectures as $prefecture)
                                    <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="postalcode" class="form-label">郵便番号</label>
                            <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode') }}">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">都道府県以降の住所</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                        </div>

                        <div class="mb-3">
                            <label for="tel" class="form-label">電話番号</label>
                            <input type="text" class="form-control" id="tel" name="tel" value="{{ old('tel') }}">
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
