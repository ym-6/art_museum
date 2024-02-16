<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserMuseum extends Migration
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
        $table->unsignedBigInteger('users_id'); // 外部キーとしてユーザーIDを参照するカラム
        $table->foreign('users_id')->references('id')->on('users'); // 外部キー制約
        //美術館ID
        $table->unsignedBigInteger('art_museums_id'); // 外部キーとして美術館のIDを参照するカラム
        $table->foreign('art_museums_id')->references('id')->on('art_museums'); // 外部キー制約
        
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
