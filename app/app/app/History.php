<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'visit_histories';

    protected $fillable = [
        'date', //訪問日
        'name', //美術館名
        'memo',     //メモ
        'user_id',  //作成したユーザーID
        'art_museum_id',    //対象の美術館ID
        'del_flg',  //削除フラグ
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
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
