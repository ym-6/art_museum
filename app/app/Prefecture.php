<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Prefecture extends Model
{
    protected $fillable = [
        'name',     //都道府県名
    ];
}
