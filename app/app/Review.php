<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = [
        'title',            // レビュータイトル
        'body',             // レビュー本文
        'criterion',        // 評価
        'user_id',          // 作成したユーザーID
        'art_museum_id',    // 対象の美術館ID
        'del_flg',          // 削除フラグ
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'like_flg', 'user_id');
    }

    public function museum()
    {
        return $this->belongsTo(Museum::class, 'art_museum_id');
    }

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class, 'prefecture_id');
    }


}
