@extends('layouts.navlayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">来訪歴詳細</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- 美術館の画像 -->
                            <img src="{{ $visitHistory->museum->image_url }}" class="img-fluid" alt="{{ $visitHistory->museum->museum_name }}">
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <p>{{ $visitHistory->museum->museum_name }}</p>
                                    <p>訪問日: {{ $visitHistory->visit_date }}</p>
                                    <p>メモ: {{ $visitHistory->memo }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <!-- ボタン -->
                        <a href="{{ route('history_list') }}" class="btn btn-primary">戻る</a>
                        <a href="{{ route('history_edit') }}" class="btn btn-info">編集</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete">削除</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Confirm Delete Modal -->
<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteLabel">削除の確認</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                この来訪歴を削除してもよろしいですか？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                <a href="{{ route('history_delete_conf') }}" class="btn btn-danger">削除する</a>
            </div>
        </div>
    </div>
</div>

@endsection
