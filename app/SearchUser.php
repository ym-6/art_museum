<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchUser extends Model
{
    protected $fillable = [
        'user_id',
        'users_name',
        'museums_id',
        'reviews_id',
        'historys_id',
        'posted_at',
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
