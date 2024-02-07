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
                'display' => 'row',
                'product_category_id' => 5
            ],
            [
                'name' => 'size',
                'display' => 'col',
                'product_category_id' => 5
            ],
            [
                'name' => 'length',
                'display' => 'row',
                'product_category_id' => 10
            ],
            [
                'name' => 'weight',
                'display' => 'col',
                'product_category_id' => 10
            ],
        ];

        DB::table('product_variations')->insert($data);
    }
}
