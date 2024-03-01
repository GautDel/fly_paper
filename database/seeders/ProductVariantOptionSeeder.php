<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariantOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'product_id' => 1,
                'variation_option_id' => 1,
                'prod_opt_id' => '1-1'
            ],
            [
                'product_id' => 1,
                'variation_option_id' => 2,
                'prod_opt_id' => '1-2'
            ],
            [
                'product_id' => 1,
                'variation_option_id' => 3,
                'prod_opt_id' => '1-3'

            ],
            [
                'product_id' => 1,
                'variation_option_id' => 4,
                'prod_opt_id' => '1-4'

            ],
            [
                'product_id' => 1,
                'variation_option_id' => 5,
                'prod_opt_id' => '1-5'
            ],
            [
                'product_id' => 1,
                'variation_option_id' => 6,
                'prod_opt_id' => '1-6'
            ],
            [
                'product_id' => 1,
                'variation_option_id' => 7,
                'prod_opt_id' => '1-7'

            ],
            [
                'product_id' => 1,
                'variation_option_id' => 8,
                'prod_opt_id' => '1-8'
            ],
            [
                'product_id' => 1,
                'variation_option_id' => 9,
                'prod_opt_id' => '1-9'
            ],

        ];

        DB::table('product_variant_options')->insert($data);
    }
}
