<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Museum extends Model
{
    protected $table = 'art_museums';

    protected $fillable = [
        'name', //美術館名
        'postalcode', //郵便番号
        'prefecture_id',   //都道府県
        'address',  //それ以降住所  
        'tel',  //電話番号
        'user_id',  //作成ユーザーID
        'del_flg',  //削除フラグ
        'image_path', // 画像のパスまたはファイル名
    
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class, 'prefecture_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'art_museum_id');
    }

    public function likestore()
    {
        return $this->hasMany(Like::class, 'art_museum_id');
    }

}
