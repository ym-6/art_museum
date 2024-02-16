<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Museum extends Model
{
    protected $fillable = [
        'name', //美術館名
        'prefectures_id',   //都道府県
        'address',  //それ以降住所  
        'tel',  //電話番号
        'user_id',  //作成ユーザーID
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
