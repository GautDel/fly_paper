<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Black Ant',
                'description' => 'The Best trout reel',
                'image' => '/black_ant.png',
                'price' => '1.25',
                'in_stock' => true,
                'new' => false,
                'sale' => false,
                'sale_percent' => 0,
                'brand' => 'Orvis',
                'product_category_id' => 5,
            ],
            [
                'name' => 'Hydros Reel',
                'description' => 'The Best fly for trout',
                'image' => '/black_ant.png',
                'price' => '40.50',
                'in_stock' => true,
                'new' => true,
                'sale' => false,
                'sale_percent' => 0,
                'brand' => 'Orvis',
                'product_category_id' => 10,
            ],
            [
                'name' => 'Black Ant',
                'description' => 'The Best fly for trout',
                'image' => '/black_ant.png',
                'price' => '1.99',
                'in_stock' => false,
                'new' => true,
                'sale' => false,
                'sale_percent' => 0,
                'brand' => 'Orvis',
                'product_category_id' => 5,
            ],

            [
                'name' => 'Emerger',
                'description' => 'The Second best fly for trout',
                'image' => '/black_ant.png',
                'price' => '1.50',
                'in_stock' => false,
                'new' => false,
                'sale' => false,
                'sale_percent' => 0,
                'brand' => 'Shakespeare',
                'product_category_id' => 5,
            ],

            [
                'name' => 'Golden Spinner',
                'description' => 'Illis spinner, the best spinner around!',
                'image' => 'www.meatspin.com',
                'price' => '2.30',
                'in_stock' => true,
                'new' => true,
                'sale' => true,
                'sale_percent' => 20,
                'brand' => 'Orvis',
                'product_category_id' => 7,
            ],

        ];

        DB::table('products')->insert($data);
    }
}
