<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlyFlyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'fly_id' => 1,
                'fly_category_id' => 1
            ],
            [
                'fly_id' => 2,
                'fly_category_id' => 1
            ],
            [
                'fly_id' => 3,
                'fly_category_id' => 2
            ],
            [
                'fly_id' => 4,
                'fly_category_id' => 2
            ],
            [
                'fly_id' => 5,
                'fly_category_id' => 3
            ],
            [
                'fly_id' => 6,
                'fly_category_id' => 3
            ],
        ];

        DB::table('fly_fly_category')->insert($data);
    }
}
