@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">来訪歴登録</div>

                <div class="card-body">
                    <form action="{{ route('history_conf') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="museum_name" class="form-label">美術館名</label>
                            <input type="text" class="form-control" id="museum_name" name="museum_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="visit_date" class="form-label">訪問日</label>
                            <input type="date" class="form-control" id="visit_date" name="visit_date" required>
                        </div>

                        <div class="mb-3">
                            <label for="memo" class="form-label">メモ</label>
                            <textarea class="form-control" id="memo" name="memo" rows="5" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">画像登録</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-primary">登録</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
