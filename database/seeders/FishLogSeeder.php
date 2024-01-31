<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FishLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'fish' => 'Rainbow Trout',
                'weight' => 3.7,
                'mass_unit' => 'kg',
                'fish_length' => 2.2,
                'length_unit' => 'cm',
                'rod' => 'Full flex bamboo',
                'rod_length' => "9'",
                'rod_weight' => '2',
                'reel' => 'Hydra',
                'reel_weight' => '00',
                'line' => 'Hydros',
                'line_type' => 'floating',
                'line_weight' => '02',
                'tippet' => 'Orvis SuperStrong',
                'tippet_weight' => '2x',
                'fly' => 'Black Ant',
                'fly_category' => 1,
                'hook_size' => '16',
                'location' => 'Montpellier, France',
                'weather' => 'Sunny',
                'day_time' => 'Early Morning',
                'precise_time' => null,
                'water_clarity' => "Crystal Clear",
                'water_movement' => "Still",
                'note' => null,
                'user_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ];

        DB::table('fish_logs')->insert($data);
    }
}
