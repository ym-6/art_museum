<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Image extends Controller
{
    public function mainImage($imageName)
    {
        // 画像のパスを返す
        return public_path('img/' . $imageName);
    }
}
