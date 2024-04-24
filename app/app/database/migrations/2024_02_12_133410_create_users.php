<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            //ユーザー名
            $table->string('user_name', '20');
            //メールアドレス
            $table->string('email', '100');
            //パスワード
            $table->string('password', '100');
            //ユーザータイプ（true１が管理者）
            $table->boolean('is_admin')->default(0); 
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
        Schema::dropIfExists('users');
    }
}
