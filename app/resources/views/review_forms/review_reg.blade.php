@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">レビュー登録</div>

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

                    <form action="{{ route('reviews.store') }}" method="POST">
                        @csrf

                        <div class="card-body">
                        <div class="mb-3">
                            <label for="museum" class="form-label">美術館名</label>
                            <select name="name" id="name" class="form-select">
                                <option value="">美術館を選択してください</option>
                                @foreach($museums as $museum)
                                    <option value="{{ $museum->id }}">{{ $museum->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">レビュータイトル</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                        </div>

                        <div class="mb-3">
                            <label for="body" class="form-label">レビュー本文</label>
                            <textarea class="form-control" id="body" name="body" rows="5">{{ old('body') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="criterion" class="form-label">評価</label>
                            <select class="form-select" id="criterion" name="criterion">
                                <option value="0">◯</option>
                                <option value="1">△</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">確認</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
