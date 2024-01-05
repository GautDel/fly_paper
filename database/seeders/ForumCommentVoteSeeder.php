<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumCommentVoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            [
                'forum_post_comment_id' => 1,
                'upvote' => true,
                'user_id' => 1,
            ],
            [
                'forum_post_comment_id' => 1,
                'upvote' => true,
                'user_id' => 2,
            ],
            [
                'forum_post_comment_id' => 2,
                'upvote' => false,
                'user_id' => 1,
            ],
            [
                'forum_post_comment_id' => 2,
                'upvote' => false,
                'user_id' => 2,
            ],
            [
                'forum_post_comment_id' => 3,
                'upvote' => true,
                'user_id' => 1,
            ],
        ];

        DB::table('forum_post_comment_votes')->insert($data);
    }
}
