<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;  //暗号化処理

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 初期ユーザー
        DB::table('users')->insert([
            [
                'username' => 'Atlas一郎',
                'mail' => 'atlas_sns@mail.com',
                'password' => Hash::make('password123456'),

            ]
        ]);
    }
}
