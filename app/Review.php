<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Review extends Model
{
    protected $fillable = [
        'title',    //レビュータイトル
        'text',     //レビュー本文
        'criterion',  //評価
        'users_id',  //作成したユーザーID
        'art_museums_id',    //対象の美術館ID
        'like_flg'  //いいねフラグ
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function art_museum()
    {
        return $this->belongsTo(Museum::class);
    }
}
