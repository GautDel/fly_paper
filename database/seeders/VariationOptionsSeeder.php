<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariationOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'value' => 'tan',
                'product_variation_id' => 1
            ],
            [
                'value' => 'grey',
                'product_variation_id' => 1
            ],
            [
                'value' => 'olive',
                'product_variation_id' => 1
            ],
            [
                'value' => '01',
                'product_variation_id' => 4
            ],
            [
                'value' => '02',
                'product_variation_id' => 4
            ],
            [
                'value' => '03',
                'product_variation_id' => 4
            ],
            [
                'value' => '04',
                'product_variation_id' => 4
            ],
        ];

        DB::table('variation_options')->insert($data);
    }
}
