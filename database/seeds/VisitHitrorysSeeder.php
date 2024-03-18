<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class VisitHitrorysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $historys = [
            [
                'date' => '2023-12-30', // 訪問日
                'name' => 'サンプル美術館',   //美術館名
                'memo' => '2024年3月末まで企画展開催中',    // メモ
                'users_id' => 1, //ユーザID
                'art_museums_id' => 1,  //美術館ID
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),    
            ],    
        ];

    foreach ($historys as $history) {
        DB::table('visit_historys')->insert($history);
    }

    }
}
