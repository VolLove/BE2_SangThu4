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
            'name' => 'IPhone 14 plus',
            'description' => 'A brand new, sealed Lilac Purple Verizon Global Unlocked Galaxy S9 by Samsung. This is an upgrade. Clean ESN and activation ready.',
            'manufacturer_id' => '1',
            'categories_id' => '1',
            'image' => 'iPhone-14-plus-thumb-den-600x600.jpg',
            'price' => 16409000
        ]);

        DB::table('products')->insert([
            'name' => 'Iphone 14 Pro Max',
            'description' => 'GSM & CDMA FACTORY UNLOCKED! WORKS WORLDWIDE! FACTORY UNLOCKED. iPhone x 64gb. iPhone 8 64gb. iPhone 8 64gb. iPhone X with iOS 11.',
            'manufacturer_id' => '1',
            'categories_id' => '1',
            'image' => 'iphone-14-pro-max-den-thumb-600x600.jpg',
            'price' => 2308000
        ]);

        DB::table('products')->insert([
            'name' => 'Xiaomi Redmi 12C',
            'description' => 'New condition • No returns, but backed by eBay Money back guarantee',
            'manufacturer_id' => '7',
            'categories_id' => '1',
            'image' => 'xiaomi-redmi-12c-grey-thumb-600x600.jpg',
            'price' => 1584900
        ]);

        DB::table('products')->insert([
            'name' => 'Vivo V27E',
            'description' => 'NETWORK Technology GSM. Protection Corning Gorilla Glass 4. MISC Colors Space Black, Luxe White, Modern Beige, Ocean Blue, Opal Blue. SAR EU 0.59 W/kg (head).',
            'manufacturer_id' => '6',
            'categories_id' => '1',
            'image' => 'vivo-v27e-tim-thumb-600x600.jpg',

            'price' => 3756000
        ]);

        DB::table('products')->insert([
            'name' => 'Realme C30s',
            'description' => 'Cricket Wireless - Huawei Elate. New Sealed Huawei Elate Smartphone.',
            'manufacturer_id' => '5',
            'categories_id' => '1',
            'image' => 'Realme-c30s-xanh-temp-600x600.jpg',
            'price' => 1596000
        ]);

        DB::table('products')->insert([
            'name' => 'Samsung Galaxy A23',
            'description' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
            'manufacturer_id' => '2',
            'categories_id' => '1',
            'image' => 'samsung-galaxy-a23-cam-thumb-600x600.jpg',
            'price' => 3052000
        ]);
        DB::table('products')->insert([
            'name' => 'Samsung Galaxy A24',
            'description' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
            'manufacturer_id' => '2',
            'categories_id' => '1',
            'image' => 'samsung-galaxy-a24-black-thumb-600x600.jpg',
            'price' => 3052000
        ]);
        DB::table('products')->insert([
            'name' => 'Acer Aspire 3',
            'description' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
            'manufacturer_id' => '4',
            'categories_id' => '2',
            'image' => 'acer-aspire-3-a315-57-379k-i3-nxkagsv001-(22).jpg',
            'price' => 10000000
        ]);
        DB::table('products')->insert([
            'name' => 'Apple Macbook Air 2020',
            'description' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
            'manufacturer_id' => '1',
            'categories_id' => '2',
            'image' => 'apple-macbook-air-2020-mgn63saa-(73).jpg',
            'price' => 10000000
        ]);
        DB::table('products')->insert([
            'name' => 'Asus Vivobook',
            'description' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
            'manufacturer_id' => '8',
            'categories_id' => '2',
            'image' => 'asus-vivobook-x415ea-i3-ek2034w.jpg',
            'price' => 10000000
        ]);
        DB::table('products')->insert([
            'name' => 'Bluetooth Airpods 2 Apple MV7N2',
            'description' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
            'manufacturer_id' => '1',
            'categories_id' => '3',
            'image' => 'bluetooth-airpods-2-apple-mv7n2-imei-ava-600x600.jpg',
            'price' => 10000000
        ]);
        DB::table('products')->insert([
            'name' => 'Bluetooth Airpods Pro Magsafe Charge Apple MLWK3',
            'description' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
            'manufacturer_id' => '1',
            'categories_id' => '3',
            'image' => 'bluetooth-airpods-pro-magsafe-charge-apple-mlwk3-thumb-600x600.jpg',
            'price' => 10000000
        ]);
        DB::table('products')->insert([
            'name' => 'Bluetooth JBL GO 3',
            'description' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
            'manufacturer_id' => '19',
            'categories_id' => '4',
            'image' => 'bluetooth-jbl-go-3-xanh-den-thumb-5-600x600.jpg',
            'price' => 10000000
        ]);
        DB::table('products')->insert([
            'name' => 'Bluetooth Mozard K8',
            'description' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
            'manufacturer_id' => '16',
            'categories_id' => '3',
            'image' => 'bluetooth-mozard-k8-thumb-5-600x600.jpg',
            'price' => 10000000
        ]);
        DB::table('products')->insert([
            'name' => 'Bluetooth True Wireless AVA+ DS200A',
            'description' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
            'manufacturer_id' => '9',
            'categories_id' => '3',
            'image' => 'bluetooth-true-wireless-ava-ds200a-wb-thumb-600x600.png',
            'price' => 10000000
        ]);
        DB::table('products')->insert([
            'name' => 'Bluetooth True Wireless AVA+ DS201A-WB',
            'description' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
            'manufacturer_id' => '9',
            'categories_id' => '3',
            'image' => 'bluetooth-true-wireless-ava-ds201a-wb-021021-090449-600x600.jpg',
            'price' => 10000000
        ]);
        DB::table('products')->insert([
            'name' => 'Bluetooth True Wireless Rezo F15',
            'description' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
            'manufacturer_id' => '17',
            'categories_id' => '3',
            'image' => 'bluetooth-true-wireless-rezo-f15-thumb-600x600.jpg',
            'price' => 10000000
        ]);
        DB::table('products')->insert([
            'name' => 'Bluetooth Xmobile Z706a',
            'description' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
            'manufacturer_id' => '18',
            'categories_id' => '3',
            'image' => 'bluetooth-xmobile-z706a-den-thumb1-600x600.jpg',
            'price' => 10000000
        ]);
        DB::table('products')->insert([
            'name' => 'Dell Inspiron 15 3520 I5',
            'description' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
            'manufacturer_id' => '13',
            'categories_id' => '2',
            'image' => 'dell-inspiron-15-3520-i5-n5i5122w1-191222-091429-600x600.jpg',
            'price' => 10000000
        ]);
        DB::table('products')->insert([
            'name' => 'Loa bluetooth Fenda W5 Plus',
            'description' => 'The device is in good cosmetic condition and will show minor scratches and/or scuff marks.',
            'manufacturer_id' => '14',
            'categories_id' => '4',
            'image' => 'loa-bluetooth-fenda-w5-plus-xanh-navy-thumb-3-600x600.jpg',
            'price' => 10000000
        ]);
    }
}
