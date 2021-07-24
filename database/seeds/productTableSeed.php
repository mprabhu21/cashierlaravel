<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserting seeds to the products table
        $products_list = [
            [
                'product_code' => 'MOB001',
                'product_name' => 'Lenovo Mobile',
                'product_description' => 'Lenovo 10th Gen Intel Core i7 Powered Lenovo Laptops. Laptops, PCs, Tablets & Data Center. Choose from our Wide Range of Ultra Slim, Convertibles, Gaming & Affordable Laptops.',
                'product_price' => '25000',
                'product_quantity' => 100
            ],
            [
                'product_code' => 'MOB002',
                'product_name' => 'LG Mobile',
                'product_description' => 'Explore the latest range of consumer electronics today from LG India including OLED TVs, Smartphones, ACs, Washing Machines, Fridge Freezers & More',
                'product_price' => '20000',
                'product_quantity' => 50
            ],
            [
                'product_code' => 'MOB003',
                'product_name' => 'One Plus Mobile',
                'product_description' => 'OnePlus TV Y Series 32 | 40 | 43 Y1 ... Hold this in your hand and you get the distinct feeling that this is a well-built and premium phone.',
                'product_price' => '24000',
                'product_quantity' => 150
            ],
            [
                'product_code' => 'MOB004',
                'product_name' => 'Nokia Mobile',
                'product_description' => 'Whether you\'re tech-savvy or prefer simplicity, find a Nokia phone for you today. Explore Nokia Android phones, including mobile phones with Android 10.',
                'product_price' => '15000',
                'product_quantity' => 100
            ],
            [
                'product_code' => 'MOB005',
                'product_name' => 'Huawei Mobile',
                'product_description' => 'Buy Huawei mobile phones at best prices: All new latest 4G Huawei mobile phones features, specifications, user reviews.',
                'product_price' => '26000',
                'product_quantity' => 175
            ]
        ];
        DB::table('products')->insert($products_list);
    }
}
