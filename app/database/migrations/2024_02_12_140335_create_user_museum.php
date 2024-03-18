<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMuseum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_museum', function (Blueprint $table) {
            //ユーザーID
            $table->unsignedBigInteger('user_id'); // 外部キーとしてユーザーIDを参照するカラム
            $table->foreign('user_id')->references('id')->on('users'); // 外部キー制約
            //美術館ID
            $table->unsignedBigInteger('art_museum_id'); // 外部キーとして美術館のIDを参照するカラム
            $table->foreign('art_museum_id')->references('id')->on('art_museums'); // 外部キー制約
            //レビューID
            $table->unsignedBigInteger('review_id');
            $table->foreign('review_id')->references('id')->on('reviews');
        
            $table->unique(['user_id', 'review_id']);
        
            // いいねフラグ
            $table->boolean('like_flg')->default(0);
            //削除フラグ
            $table->boolean('del_flg')->default(0);

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
        Schema::dropIfExists('user_museum');
    }
}
