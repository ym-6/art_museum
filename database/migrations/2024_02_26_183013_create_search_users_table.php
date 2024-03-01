<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_users', function (Blueprint $table) {
            // ユーザID
            $table->unsignedBigInteger('users_id'); // 外部キーとしてユーザIDを参照するカラム
            $table->foreign('users_id')->references('id')->on('users'); // 外部キー制約

            // 美術館ID
            $table->unsignedBigInteger('art_museums_id'); // 外部キーとして美術館のIDを参照するカラム
            $table->foreign('art_museums_id')->references('id')->on('art_museums'); // 外部キー制約

            // レビューID
            $table->unsignedBigInteger('reviews_id'); // 外部キーとしてレビューIDを参照するカラム
            $table->foreign('reviews_id')->references('id')->on('reviews'); // 外部キー制約

            // 来訪歴ID
            $table->unsignedBigInteger('visit_historys_id'); // 外部キーとして来訪歴のIDを参照するカラム
            $table->foreign('visit_historys_id')->references('id')->on('visit_historys'); // 外部キー制約

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
        Schema::dropIfExists('search_users');
    }
}
