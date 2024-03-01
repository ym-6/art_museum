<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'date', //訪問日
        'name', //美術館名
        'memo',     //メモ
        'users_id',  //作成したユーザーID
        'art_museums_id',    //対象の美術館ID
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
