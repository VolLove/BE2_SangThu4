<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Samsung Galaxy S9',
            'description' => 'A brand new, sealed Lilac Purple Verizon Global Unlocked Galaxy S9 by Samsung. This is an upgrade. Clean ESN and activation ready.',
            'manufacturer_id' => '5',
            'categories_id' => '1',
            'image' => 'logo.png',
            'price' => 16409000
        ]);

        DB::table('products')->insert([
            'name' => 'Apple iPhone X',
            'description' => 'GSM & CDMA FACTORY UNLOCKED! WORKS WORLDWIDE! FACTORY UNLOCKED. iPhone x 64gb. iPhone 8 64gb. iPhone 8 64gb. iPhone X with iOS 11.',
            'manufacturer_id' => '5',
            'categories_id' => '1',
            'image' => 'logo.png',
            'price' => 2308000
        ]);

        DB::table('products')->insert([
            'name' => 'Google Pixel 2 XL',
            'description' => 'New condition • No returns, but backed by eBay Money back guarantee',
            'manufacturer_id' => '5',
            'categories_id' => '1',
            'image' => 'logo.png',
            'price' => 1584900
        ]);

        DB::table('products')->insert([
            'name' => 'LG V10 H900',
            'description' => 'NETWORK Technology GSM. Protection Corning Gorilla Glass 4. MISC Colors Space Black, Luxe White, Modern Beige, Ocean Blue, Opal Blue. SAR EU 0.59 W/kg (head).',
            'manufacturer_id' => '5',
            'categories_id' => '1',
            'image' => 'logo.png',

            'price' => 3756000
        ]);

        DB::table('products')->insert([
            'name' => 'Huawei Elate',
            'description' => 'Cricket Wireless - Huawei Elate. New Sealed Huawei Elate Smartphone.',
            'manufacturer_id' => '5',
            'categories_id' => '1',
            'image' => 'logo.png',
            'price' => 1596000
        ]);

        DB::table('products')->insert([
            'name' => 'HTC One M10',
            'description' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
            'manufacturer_id' => '5',
            'categories_id' => '1',
            'image' => 'logo.png',
            'price' => 3052000
        ]);
    }
}
