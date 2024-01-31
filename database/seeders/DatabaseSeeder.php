<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
            OneLinerSeeder::class,
            JokeSeeder::class,
            FlySeeder::class,
            FlyCategorySeeder::class,
            FlyFlyCategorySeeder::class,
            FlyCommentsSeeder::class,
            ForumSectionSeeder::class,
            ForumPostSeeder::class,
            ForumPostCommentSeeder::class,
            ForumPostVoteSeeder::class,
            ForumCommentVoteSeeder::class,
            NotesSeeder::class,
            ProductCategoriesSeeder::class,
            ProductsSeeder::class,
            ProductVariationsSeeder::class,
            VariationOptionsSeeder::class
        ]);
    }
}
