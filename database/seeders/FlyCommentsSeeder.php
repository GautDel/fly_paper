<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlyCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            [
                'comment' => "I agree with the other user, it's a fantastic fly!",
                'user_id' => 1,
                'fly_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'comment' => "I love this fly, it really works well for big trout in shallower water!",
                'user_id' => 2,
                'fly_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'comment' => "I love this fly, it really works well for big trout in shallower water!",
                'user_id' => 1,
                'fly_id' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'comment' => "I love this fly, it really works well for big trout in shallower water!",
                'user_id' => 1,
                'fly_id' => 3,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'comment' => "I love this fly, it really works well for big trout in shallower water!",
                'user_id' => 1,
                'fly_id' => 4,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ];

        DB::table('fly_comments')->insert($data);
    }
}
