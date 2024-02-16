<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'A-side') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- BootstrapのCSS読み込み -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- jQuery読み込み -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <!-- ロゴ -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="path/to/your/logo.png" alt="Logo" style="height: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="my-navbar-control">
                @if(Auth::check())
                    <a href="{{ route('mypage') }}" class="btn btn-primary mx-2">マイページ</a>
                    <a href="#" id="logout" class="btn btn-danger mx-2">ログアウト</a>
                    <form id='logout-form' action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <script>
                        document.getElementById('logout').addEventListener('click', function(event){
                        event.preventDefault();
                        document.getElementById('logout-form').submit();
                        });
                    </script>
                @else
                    <a class="btn btn-primary mx-2" href="{{ route('login') }}">ログイン</a>
                    <a class="btn btn-success mx-2" href="{{ route('register') }}">新規登録</a>
                @endif
            </div>
        </div>
    </nav>
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-around mt-2">
                @yield('content')
            </div>
        </div>
    </main>
</div>

</body>
</html>
