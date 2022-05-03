<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('category')->insert([
            [
                
                'name' => 'Mobile',
                'created_by' => '1'
            ],
            [
                
                'name' => 'Television',
                'created_by' => '1'
            ],
            [
                
                'name' => 'Sony',
                'created_by' => '1'
            ],
            [
                
                'name' => 'SamSung',
                'created_by' => '1'
            ],
            [
                
                'name' => 'Iphone',
                'created_by' => '1'
            ]
        ]);
        DB::table('products')->insert([
            [
                'name' => 'Iphone X',
                'price' => '120',
                'description' => 'A smartphone Iphone X',
                'quantity' => '10',
                'created_by' => '1',
                'updated_by' => null,
                'quantitative' => 'pcs',
                'gallery' => 'https://bitly.com.vn/g6mmhj'

            ],
            [
                'name' => 'Sony TV bravia',
                'price' => '200',
                'description' => 'Smart Tivi 4K Sony KD-55X80J 55 ',
                'created_by' => '1',
                'updated_by_id' => null,
                'quantity' => '10',
                'quantitative' => 'pcs',
                'gallery' => 'https://bitly.com.vn/l0odx1'

            ],
            [
                'name' => 'TV promax',
                'price' => '1000',
                'description' => 'A dad of Television',

                'quantity' => '10',
                'created_by_id' => '1',
                'updated_by_id' => null,
                'quantitative' => 'pcs',
                'gallery' => 'https://bitly.com.vn/nbb6vj'

            ],
            [
                'name' => 'Smart Tivi Samsung 4K',
                'price' => '250',
                'description' => 'Smart Tivi Samsung 4K 55 inch',

                'quantity' => '10',
                'created_by' => '1',
                'updated_by' => null,
                'quantitative' => 'pcs',
                'gallery' => 'https://bitly.com.vn/5u5dcb'

            ]
        ]);
        DB::table('products_categories')->insert([
            [
                
                'product_id' => '1 ',
                'category_id' => '5',
                'created_by' => '1'
            ],
            [
                
                'product_id' => '1 ',
                'category_id' => '1',
                'created_by' => '1'
            ],
            [
                
                'product_id' => '2',
                'category_id' => '2',
                'created_by' => '1'
            ],
            [
                
                'product_id' => '2 ',
                'category_id' => '3',
                'created_by' => '1'
            ],
            [
                
                'product_id' => '3 ',
                'category_id' => '4',
                'created_by' => '1'
            ]
        ]);
    }
}
