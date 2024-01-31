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
                'name' => 'Golden Spinner',
                'description' => 'Illis spinner, the best spinner around!',
                'img' => 'www.meatspin.com',
                'price' => '2.30',
                'brand' => 'Orvis',
                'product_category_id' => 5,
            ],
        ];

        DB::table('products')->insert($data);
    }
}
