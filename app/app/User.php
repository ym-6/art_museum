<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;



class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 
        'email', 
        'password',
        'is_admin', //管理フラグ
        'del_flg',  //削除フラグ
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
     * The default attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_admin' => 0,
    ];

    public function art_museums()
    {
        return $this->belongsTo(ArtMuseums::class, 'museum_id');
    }
    
    public function review()
    {
        return $this->belongsTo(Reviews::class, 'review_id');
    }
    
    public function visit_histories()
    {
        return $this->hasMany(History::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function histories()
    {
        return $this->hasMany(History::class);
    }

    public function postedReviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }
            
    public function likedReviews()
    {
        return $this->hasMany(Like::class, 'user_id')->where('like_flg', true);
    }
    
    public function myreview()
    {
        return $this->hasMany(Like::class, 'review_id');
    }

    public function user_museum()
    {
        return $this->hasOne(Like::class);
    }


}
