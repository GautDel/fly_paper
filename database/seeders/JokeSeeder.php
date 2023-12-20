<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JokeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'text_1' => "What do you get when you cross a fishing lure with a gym sock?",
                'text_2' => "I don’t know. What?",
                'text_3' => "A hook, line and stinker!",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'text_1' => "What do you call bad bait?",
                'text_2' => "I don’t know. What?",
                'text_3' => "A fail-lure!",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'text_1' => "Why did the fish blush?",
                'text_2' => "I'm not sure... why?",
                'text_3' => "Because it saw the ocean's bottom!",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

        ];

        DB::table('jokes')->insert($data);
    }
}
