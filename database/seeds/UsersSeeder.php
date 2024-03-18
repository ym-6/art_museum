<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            [
                'name' => '管理者',
                'email' => 'yuka.mizumoto.0626@gmail.com', 
                'password' => 'rootadmin',
                'is_admin' => 1,        
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),    
            ],

        ]);

    }
}
