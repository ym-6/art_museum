<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            //レビュータイトル
            $table->string('title', '255');
            //レビュー本文
            $table->text('text');
            //書いたユーザID
            $table->unsignedBigInteger('users_id'); // 外部キーとしてユーザーIDを参照するカラム
            $table->foreign('users_id')->references('id')->on('users'); // 外部キー制約
            //対象の美術館ID
            $table->unsignedBigInteger('art_museums_id'); // 外部キーとして美術館のIDを参照するカラム
            $table->foreign('art_museums_id')->references('id')->on('art_museums'); // 外部キー制約
            //評価（good or notgood）
            $table->tinyInteger('criterion')->default(0);
            //いいねフラグ
            $table->boolean('like_flg')->default(false); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
