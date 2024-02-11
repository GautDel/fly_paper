<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductEntriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'product_id' => 1,
                'sku' => '1-tan-16',
                'qty' => 16,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'product_id' => 1,
                'sku' => '1-tan-14',
                'qty' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'product_id' => 1,
                'sku' => '1-tan-12',
                'qty' => 10,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'product_id' => 1,
                'sku' => '1-tan-10',
                'qty' => 32,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'product_id' => 1,
                'sku' => '1-grey-16',
                'qty' => 16,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'product_id' => 1,
                'sku' => '1-grey-14',
                'qty' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'product_id' => 1,
                'sku' => '1-grey-12',
                'qty' => 10,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'product_id' => 1,
                'sku' => '1-grey-10',
                'qty' => 32,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
         ];

        DB::table('product_entries')->insert($data);
    }
}
