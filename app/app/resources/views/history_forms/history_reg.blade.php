@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">来訪歴登録</div>

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


                <div class="card-body">
                    <form action="{{ route('histories.store') }}" method="POST">
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
                            <label for="date" class="form-label">訪問日</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
                        </div>

                        <div class="mb-3">
                            <label for="memo" class="form-label">メモ</label>
                            <textarea class="form-control" id="memo" name="memo" rows="5" value="{{ old('memo') }}"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">登録</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
