<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // レビューの初期データを挿入する
        DB::table('reviews')->insert([
            [
                'title' => '素晴らしい体験',
                'text' => 'この美術館で素晴らしい体験をしました。展示品は素晴らしかったです！',
                'criterion' => 1, // 評価を0に設定
                'users_id' => 1, 
                'art_museums_id' => 1,
                'like_flg' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),    
            ],

            [
                'title' => '期待外れ',
                'text' => 'この美術館には期待外れでした。展示品も少なく、駅からのアクセスも不便です。',
                'criterion' => 0, // 評価を1に設定
                'users_id' => 1,
                'art_museums_id' => 2,
                'like_flg' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),    
            ],

        ]);   
    }
}
