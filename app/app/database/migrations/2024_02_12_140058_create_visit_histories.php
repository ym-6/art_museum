<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            //来訪日
            $table->date('date')->nullable();
            //美術館名
            $table->string('name', '255');
            //来訪歴メモ
            $table->string('memo', '255')->nullable();
            //書いたユーザID
            $table->unsignedBigInteger('user_id'); // 外部キーとしてユーザーIDを参照するカラム
            $table->foreign('user_id')->references('id')->on('users'); // 外部キー制約
            //美術館ID
            $table->unsignedBigInteger('art_museum_id'); // 外部キーとして美術館のIDを参照するカラム
            $table->foreign('art_museum_id')->references('id')->on('art_museums'); // 外部キー制約
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
        Schema::dropIfExists('visit_histories');
    }
}
