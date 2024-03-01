<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Museum extends Model
{
    protected $table = 'art_museums';

    protected $fillable = [
        'name', //美術館名
        'postalcode', //郵便番号
        'prefectures_id',   //都道府県
        'address',  //それ以降住所  
        'tel',  //電話番号
        'user_id',  //作成ユーザーID
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class, 'prefectures_id');
    }
}
