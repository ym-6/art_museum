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
        $reviews = [
            [
                'title' => '素晴らしい体験',
                'body' => 'この美術館で素晴らしい体験をしました。展示品は素晴らしかったです！',
                'criterion' => 1,
                'user_id' => 1, 
                'art_museum_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),    
            ],

            [
                'title' => '期待外れ',
                'body' => 'この美術館には期待外れでした。展示品も少なく、駅からのアクセスも不便です。',
                'criterion' => 0,
                'user_id' => 1,
                'art_museum_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),    
            ],

        ];

    foreach ($reviews as $review) {
        DB::table('reviews')->insert($review);
    }

    }
}
