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
        $museums = [
            [
                'name' => 'サンプル美術館',
                'prefecture_id' => 1,
                'postalcode' => '111-1111',
                'address' => 'サンプル市1-1',  
                'tel' => '000-0000-0000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),    
            ],

            [
                'name' => '例美術館',
                'prefecture_id' => 2,
                'postalcode' => '222-2222',
                'address' => '例市見本町2-2',  
                'tel' => '222-2222-2222',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),    
            ],

            [
                'name' => '三降美術館',
                'prefecture_id' => 10,
                'postalcode' => '333-3333',
                'address' => '三降区三降町3-33',  
                'tel' => '300-3000-3000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),    
            ],

        ];

        foreach ($museums as $museum) {
            DB::table('art_museums')->insert($museum);
        }
    
    }
}
