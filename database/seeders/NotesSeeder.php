<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            [
                'title' => "Homemade Fly Catch",
                'body' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean faucibus luctus euismod. Mauris sollicitudin vel erat vel elementum. Maecenas faucibus, sapien non mollis hendrerit, enim dolor viverra.",
                'user_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'title' => "Testing Notes...",
                'body' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et ante viverra, iaculis mauris maximus, consectetur quam. Ut eget lectus vestibulum, imperdiet nisl vitae, faucibus est. Donec sit amet suscipit nibh, in ornare velit. Sed quis odio vitae mi congue bibendum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse vestibulum cursus eros, non rhoncus lacus maximus id. Aenean dignissim elementum dolor. In laoreet, eros sit amet hendrerit facilisis, lacus libero facilisis augue, a tristique dolor orci ut erat. Fusce rutrum mattis risus id feugiat. In at sodales orci. Nulla suscipit pellentesque venenatis. Aenean luctus est et ex tincidunt, a imperdiet nulla gravida. Sed sem arcu, volutpat eu pellentesque quis, laoreet malesuada urna. Pellentesque scelerisque non massa eget tempus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum ac nulla scelerisque arcu tincidunt sodales. Donec malesuada, felis at porta ante. ",
                'user_id' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'title' => "Homemade Fly Catch",
                'body' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean faucibus luctus euismod. Mauris sollicitudin vel erat vel elementum. Maecenas faucibus, sapien non mollis hendrerit, enim dolor viverra.",
                'user_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'title' => "Testing 123",
                'body' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean faucibus luctus euismod. Mauris sollicitudin vel erat vel elementum. Maecenas faucibus, sapien non mollis hendrerit, enim dolor viverra.",
                'user_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'title' => "Is it working???>>>...",
                'body' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean faucibus luctus euismod. Mauris sollicitudin vel erat vel elementum. Maecenas faucibus, sapien non mollis hendrerit, enim dolor viverra.",
                'user_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],

        ];

        DB::table('notes')->insert($data);
    }
}
