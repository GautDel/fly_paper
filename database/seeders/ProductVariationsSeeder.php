<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'color',
                'product_category_id' => 1
            ],
            [
                'name' => 'size',
                'product_category_id' => 1
            ],
            [
                'name' => 'length',
                'product_category_id' => 2
            ],
            [
                'name' => 'weight',
                'product_category_id' => 2
            ],
        ];

        DB::table('product_variations')->insert($data);
    }
}
