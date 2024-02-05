<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductRatingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'comment' => "This fly is really good. I've fished it for a month non-stop and it hasn't lost a feather!",
                'recommend' => true,
                'rating' => 5,
                'quality' => 5,
                'shipping' => 4,
                'service' => 3,
                'user_id' => 1,
                'product_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'comment' => "I Didn't like this fly :(",
                'recommend' => false,
                'rating' => 2,
                'quality' => 2,
                'shipping' => 3,
                'service' => 5,
                'user_id' => 2,
                'product_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ];

        DB::table('product_ratings')->insert($data);
    }
}
