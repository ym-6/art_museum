@extends('layouts.navlayout')

@section('content')
<style>
    .container {
        border: 1px solid rgba(0, 0, 0, 0.3); /* 枠線 */
        background-color: rgba(255, 255, 255, 0.3); /* 背景色 */
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="card mt-5">
                <div class="card-header">パスワード再設定</div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $message)
                                <p>{{ $message }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('pwd_comp.php') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label for="password">新しいパスワード</label>
                            <input type="password" class="form-control" id="password" name="password" />
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">新しいパスワード確認</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" />
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">登録</button>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
