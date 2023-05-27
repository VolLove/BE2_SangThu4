<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufacturers')->insert([
            'name' => 'Apple',
            'image' => 'logo-apple.jpg',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'SamSung',
            'image' => 'logo-samsung.png',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Sony',
            'image' => 'logo-sony.png',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Acer',
            'image' => 'logo-acer-149x40.png',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Realme',
            'image' => 'logo-realme.png',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Vivo',
            'image' => 'logo-vivo.png',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Xiaomi',
            'image' => 'logo-xiaomi-220x48-5.png',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Asus',
            'image' => 'logo-asus.png',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'AVA',
            'image' => 'logo-ava.jpeg',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Awei',
            'image' => 'logo-awei.jpg',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Beats',
            'image' => 'logo-beats.jpg',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Belkin',
            'image' => 'logo-belkin.jpg',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Dell',
            'image' => 'logo-dell-149x40.png',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Fenda',
            'image' => 'logo-Fenda.jpg',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Huawei',
            'image' => 'logo-huawei.png',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Mozard',
            'image' => 'logo-mozard.jpg',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'REZO',
            'image' => 'LOGO-REZO.png',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Xmobile',
            'image' => 'logo-Xmobile.jpg',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'JBL',
            'image' => 'logo-JBL.jpg',
        ]);
    }
}
