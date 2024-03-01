<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Prefecture extends Model
{
    protected $table = 'prefectures';

    protected $fillable = [
        'name',     //都道府県名
    ];
    
    public function museums()
    {
        return $this->hasMany(Museum::class);
    }
}
