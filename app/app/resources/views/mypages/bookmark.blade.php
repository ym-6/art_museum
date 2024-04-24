@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-4">ブックマーク一覧</h2>
            <div class="row">
                @foreach ($bookmarks as $bookmark)
                    <div class="col-mb-3">
                        <div class="row">
                            <div class="card">
                                <a href="{{ route('museums.show', ['museum' => $bookmark->museum->id]) }}">
                                    <img src="{{ $bookmark->image_path }}" class="card-img-top" alt="{{ $bookmark->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $bookmark->museum->name }}</h5>
                                        <p class="address">                    
                                            @if ($bookmark->museum->prefecture)
                                                {{ $bookmark->museum->prefecture->name }}
                                            @else
                                                非設定
                                            @endif 
                                        </p>
                                        <p class="address">{{ $bookmark->museum->address }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                <!--戻るボタン-->
                <div class="text-center mt-3">
                    <a href="{{ route('mypages.index') }}" class="btn btn-primary">戻る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
