<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ArtMuseumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 美術館の初期データを挿入する
         DB::table('art_museums')->insert([

            [
                'name' => 'サンプル美術館',
                'prefectures_id' => 1,   
                'address' => 'サンプル市1-1',  
                'tel' => 000-0000-0000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),    
            ],

            [
                'name' => '例美術館',
                'prefectures_id' => 2,   
                'address' => '例市見本町2-2',  
                'tel' => 222-2222-2222,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),    
            ],

            [
                'name' => '三降美術館',
                'prefectures_id' => 10,   
                'address' => '三降区三降町3-33',  
                'tel' => 300-3000-3000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),    
            ],

         ]);

    }
}
