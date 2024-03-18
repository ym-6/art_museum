@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">不正なアクセスです</h3>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <button class="btn btn-primary" onclick="history.back()">戻る</button>
        </div>
    </div>
</div>
@endsection
