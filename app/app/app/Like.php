<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'user_museum';

    protected $fillable = ['art_museum_id', 'user_id', 'review_id', 'like_flg'];

    protected $primaryKey = 'user_id';

    public function museum()
    {
        return $this->belongsTo(Museum::class);
    }

    public function like()
    {
        return $this->belongsTo(Review::class);
    }

    public function review()
    {
        return $this->belongsTo(Review::class);
    }
}
