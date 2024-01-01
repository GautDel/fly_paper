<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumPostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           $data = [
            [
                'comment' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac quam a purus vulputate hendrerit. Suspendisse enim diam, viverra nec magna at, tempus hendrerit ipsum. Integer mollis, purus sed vulputate vehicula, mi velit lacinia risus, a pharetra.",
                'votes' => 2,
                'user_id' => 1,
                'forum_post_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
             [
                'comment' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac quam a purus vulputate hendrerit. Suspendisse enim diam, viverra nec magna at, tempus hendrerit ipsum. Integer mollis, purus sed vulputate vehicula, mi velit lacinia risus, a pharetra.",
                'votes' => 33,
                'user_id' => 2,
                'forum_post_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'comment' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac quam a purus vulputate hendrerit. Suspendisse enim diam, viverra nec magna at, tempus hendrerit ipsum. Integer mollis, purus sed vulputate vehicula, mi velit lacinia risus, a pharetra.",
                'votes' => 248,
                'user_id' => 1,
                'forum_post_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'comment' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac quam a purus vulputate hendrerit. Suspendisse enim diam, viverra nec magna at, tempus hendrerit ipsum. Integer mollis, purus sed vulputate vehicula, mi velit lacinia risus, a pharetra.",
                'votes' => -1,
                'user_id' => 1,
                'forum_post_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ];

        DB::table('forum_post_comments')->insert($data);
    }
}
