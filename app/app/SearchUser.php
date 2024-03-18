<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchUser extends Model
{
    protected $fillable = [
        'user_id',
        'user_name',
        'review_id',
        'history_id',
        'posted_at',
    ];


    // reviewsテーブルとの関連付け
    public function reviews()
    {
        return $this->belongsTo(Review::class, 'review_id');
    }

    // historiesテーブルとの関連付け
    public function histories()
    {
        return $this->belongsTo(History::class, 'history_id');
    }

    // usersテーブルとの関連付け
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
