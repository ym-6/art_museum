<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitHistorys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_historys', function (Blueprint $table) {
            $table->bigIncrements('id');
            //来訪日
            $table->date('date')->nullable();
            //美術館名
            $table->string('name', '255');
            //来訪歴メモ
            $table->string('memo', '255')->nullable();
            //書いたユーザID
            $table->unsignedBigInteger('users_id'); // 外部キーとしてユーザーIDを参照するカラム
            $table->foreign('users_id')->references('id')->on('users'); // 外部キー制約
            //美術館ID
            $table->unsignedBigInteger('art_museums_id'); // 外部キーとして美術館のIDを参照するカラム
            $table->foreign('art_museums_id')->references('id')->on('art_museums'); // 外部キー制約

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
        Schema::dropIfExists('visit_historys');
    }
}
