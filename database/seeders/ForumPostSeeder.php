<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $data = [
            [
                'title' => "How to tie a fly?",
                'body' => "I'm wondering if anyone is willing to help me learn how to tie a fly? \br because like... it's rough doing it alone... \br \br thanks a lot in advance for the help!",
                'slug' => "How_to_tie_a_fly",
                'votes' => 0,
                'user_id' => 1,
                'forum_section_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'title' => "How to tie a fly? two is here",
                'body' => "I'm wondering if anyone is willing to help me learn how to tie a fly? \br because like... it's rough doing it alone... \br \br thanks a lot in advance for the help!",
                'slug' => "How_to_tie_a_fly_two_is_here",
                'votes' => 0,
                'user_id' => 2,
                'forum_section_id' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'title' => "How to tie a fly? 3",
                'body' => "I'm wondering if anyone is willing to help me learn how to tie a fly? \br because like... it's rough doing it alone... \br \br thanks a lot in advance for the help!",
                'slug' => "How_to_tie_a_fly_3",
                'votes' => 0,
                'user_id' => 1,
                'forum_section_id' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'title' => "How to tie a fly? this is 4",
                'body' => "I'm wondering if anyone is willing to help me learn how to tie a fly? \br because like... it's rough doing it alone... \br \br thanks a lot in advance for the help!",
                'slug' => "How_to_tie_a_fly_this_is_4",
                'votes' => 0,
                'user_id' => 2,
                'forum_section_id' => 3,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

        ];

        DB::table('forum_posts')->insert($data);
    }
}
