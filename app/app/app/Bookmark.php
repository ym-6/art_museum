<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $table = 'Bookmarks';

    protected $fillable = ['art_museum_id', 'user_id', 'bookmark_flg'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function museum()
    {
        return $this->belongsTo(Museum::class, 'art_museum_id');
    }
}
