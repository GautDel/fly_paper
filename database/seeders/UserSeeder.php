<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $data = [
            [
                'name' => "gauthier94",
                'email' => "gauthier@gmail.com",
                'password' => "gauthier",
                'about' => "I love fly fishing so much!",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => "aoife00",
                'email' => "aoife@gmail.com",
                'password' => "aoife12345",
                'about' => "I love fly fishing so much!",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]

        ];

        DB::table('users')->insert($data);
    }
}
