<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchPost extends Model
{
    protected $fillable = [
        'museums_id',
        'reviews_id',
        'historys_id',
        'user_id',
        'users_name',
        'museums_name',
        'posted_at',
        'reviews_like_flg',
    ];

    // museumsテーブルとの関連付け
    public function museum()
    {
        return $this->belongsTo(ArtMuseums::class, 'museums_id');
    }

    // reviewsテーブルとの関連付け
    public function review()
    {
        return $this->belongsTo(Reviews::class, 'reviews_id');
    }

    // historysテーブルとの関連付け
    public function history()
    {
        return $this->belongsTo(Historys::class, 'historys_id');
    }

    // usersテーブルとの関連付け
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
