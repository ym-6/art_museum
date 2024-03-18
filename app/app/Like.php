<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'user_museum';

    protected $fillable = ['art_museum_id', 'user_id', 'review_id', 'like_flg'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function museum()
    {
        return $this->belongsTo(Museum::class, 'art_museum_id');
    }

    public function review()
    {
        return $this->belongsTo(Review::class, 'review_id', 'like_flg');
    }

}
