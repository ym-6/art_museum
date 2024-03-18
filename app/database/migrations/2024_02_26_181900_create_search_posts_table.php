<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_posts', function (Blueprint $table) {
            // ユーザID
            $table->unsignedBigInteger('user_id'); // 外部キーとしてユーザIDを参照するカラム
            $table->foreign('user_id')->references('id')->on('users'); // 外部キー制約
            
            // 美術館ID
            $table->unsignedBigInteger('art_museum_id'); // 外部キーとして美術館のIDを参照するカラム
            $table->foreign('art_museum_id')->references('id')->on('art_museums'); // 外部キー制約
            
            // レビューID
            $table->unsignedBigInteger('review_id'); // 外部キーとしてレビューIDを参照するカラム
            $table->foreign('review_id')->references('id')->on('reviews'); // 外部キー制約
            
            // 来訪歴ID
            $table->unsignedBigInteger('visit_history_id'); // 外部キーとして来訪歴のIDを参照するカラム
            $table->foreign('visit_history_id')->references('id')->on('visit_histories'); // 外部キー制約
            
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
        Schema::dropIfExists('search_posts');
    }
}
