<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchPost extends Model
{
    protected $fillable = [
        'review_id',
        'history_id',
        'user_id',
        'user_name',
        'posted_at',
        'review_like_flg',
    ];

    // usersテーブルとの関連付け
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // reviewsテーブルとの関連付け
    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    // historiesテーブルとの関連付け
    public function history()
    {
        return $this->belongsTo(History::class);
    }
    
}
