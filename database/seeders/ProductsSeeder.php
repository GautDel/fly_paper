<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'description' => 'The Best fly for trout',
                'img' => '/black_ant.png',
                'price' => '1.99',
                'brand' => 'Orvis',
                'product_category_id' => 5,
            ],
            [
                'name' => 'Emerger',
                'description' => 'The Second best fly for trout',
                'img' => '/black_ant.png',
                'price' => '1.50',
                'brand' => 'Shakespeare',
                'product_category_id' => 5,
            ],

            [
                'name' => 'Golden Spinner',
                'description' => 'Illis spinner, the best spinner around!',
                'img' => 'www.meatspin.com',
                'price' => '2.30',
                'brand' => 'Orvis',
                'product_category_id' => 7,
            ],

        ];

        DB::table('products')->insert($data);
    }
}
