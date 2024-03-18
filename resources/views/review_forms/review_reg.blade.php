@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">レビュー登録</div>

                <div class="card-body">
                    <form action="{{ route('review.conf') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="museum" class="form-label">美術館名</label>
                            <!-- DBから取得した美術館名を表示 -->
                            <input type="text" class="form-control" id="museum" name="museum" value="{{ $museumName }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">レビュータイトル</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="text" class="form-label">レビュー本文</label>
                            <textarea class="form-control" id="text" name="text" rows="5" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="criterion" class="form-label">評価</label>
                            <select class="form-select" id="criterion" name="criterion" required>
                                <option value="1">◯</option>
                                <option value="2">△</option>
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
