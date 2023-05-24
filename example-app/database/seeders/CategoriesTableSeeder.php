<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Phone',
            'image' => 'icon-phone.png',
        ]);
        DB::table('categories')->insert([
            'name' => 'Laptop',
            'image' => 'laptop.png',
        ]);
        DB::table('categories')->insert([
            'name' => 'Headphone',
            'image' => 'icon-headphone.png',
        ]);
        DB::table('categories')->insert([
            'name' => 'Loudspeaker',
            'image' => 'loudspeaker.png',
        ]);
        DB::table('categories')->insert([
            'name' => 'keyboard',
            'image' => 'keyboard.png',
        ]);
        DB::table('categories')->insert([
            'name' => 'Charging Cable',
            'image' => 'cap-sac.png',
        ]);
        DB::table('categories')->insert([
            'name' => 'Stickers/Cases Screen ',
            'image' => 'danop.png',
        ]);
    }
}
