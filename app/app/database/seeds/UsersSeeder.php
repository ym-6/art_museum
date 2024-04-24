<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'user_name' => '管理者',
                'email' => 'yuka.mizumoto.0626@gmail.com', 
                'password' => Hash::make('rootadmin'), // パスワードをハッシュ化
                'is_admin' => 1,        
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),    
            ],
        ]);
    }
}
