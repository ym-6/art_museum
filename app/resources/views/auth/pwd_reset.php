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
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $message)
                                <p>{{ $message }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">メール送信</button>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
