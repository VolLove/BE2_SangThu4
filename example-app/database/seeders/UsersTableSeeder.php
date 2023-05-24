<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Đào Tân Quốc Việt',
            'email' => 'daotanquocviet@gmail.com',
            'password' => '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u',
            'phone' => '0328634349',
            'address' => 'Thủ Đức , tp HCM',
            'avatar' => 'quocViet.png',
            'is_admin' => true
        ]);
        DB::table('users')->insert([
            'name' => 'Trần Quy Đăng',
            'email' => 'QuyDang@gmail.com',
            'password' => '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u',
            'phone' => '1',
            'address' => 'iPhone-14-plus-thumb-den-600x600.jpg',
            'avatar' => 'QuyDang.jpg',
            'is_admin' => true
        ]);

        for ($i = 0; $i < 20; $i++) {
            DB::table('users')->insert([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@gmnail.com',
                'password' => '$2y$10$HLai.r.gxpIS4SqutuokwecpJCeIrYwO4uVDP5stnbl5mf83F3M1u',
                'phone' => '0123456789',
                'address' => 'Thu Duc HCM',
                'avatar' => 'user.png',
            ]);
        }
    }
}
