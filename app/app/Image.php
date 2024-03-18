<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Image extends Model
{
    protected $fillable = [
        'image_path', // 画像のパスまたはファイル名
        'art_museum_id', // 画像を所有する美術館のID
        'user_id', // 画像を所有するユーザーのID
        'del_flg',  //削除フラグ
    ];

    public function art_museums()
    {
        return $this->belongsTo(Museum::class);
    }

    public function museum()
    {
        return $this->belongsTo(Museum::class, 'art_museum_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
