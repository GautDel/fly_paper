<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => "Hare's Ear",
                'description' => "When you want to wake that monster up, try popping any of these through the surface film. Cast out and strip the popper back across the surface, repeat and await the interest.",
                'fish_species' => "Most trout species, especially brown",
                'tying' => "Soft hair and stiff bristles from a hare are wound around the shank of the hook and fastened with gold wire that suggests segmentation. Sometimes a gold bead head is added for weight and stability in the water and a strand of pheasant feather is added for a tail. The bead head can be fastened near the eye of the hook. This pattern is commonly tied on size 10 - 16 nymph hooks. Traditional colouring is a brown body with orange or brown thread.",
                'tactics' => "When this fly is immersed, the stiff fibers in the dubbing stand out and imitate the legs of an insect. Fish this lure below the surface with or without a small strike indicator and split-shot to help it sink. It is an effective pattern throughout the year because it covers a broad spectrum of prey that are active in every season.",
                'image' => "speckled_frog.png",
                'fly_category_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => "Hackled Brown Dry",
                'description' => "The Hackled Brown Dry fly is a popular dry fly in the summer months and trout will feed happily on the surface from them. This is an alternative to the brown midge and will gain attention from the trout when they are surface feeding. Will work well on still waters early season.",
                'fish_species' => "Most trout species, especially brown",
                'tying' => "Soft hair and stiff bristles from a hare are wound around the shank of the hook and fastened with gold wire that suggests segmentation. Sometimes a gold bead head is added for weight and stability in the water and a strand of pheasant feather is added for a tail. The bead head can be fastened near the eye of the hook. This pattern is commonly tied on size 10 - 16 nymph hooks. Traditional colouring is a brown body with orange or brown thread.",
                'tactics' => "When this fly is immersed, the stiff fibers in the dubbing stand out and imitate the legs of an insect. Fish this lure below the surface with or without a small strike indicator and split-shot to help it sink. It is an effective pattern throughout the year because it covers a broad spectrum of prey that are active in every season.",
                'image' => "hackled_brown.png",
                'fly_category_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => "Adams Irresistible",
                'description' => "The Adams irresistible fly has the deer hair to make it very buoyant, a super fly on choppy waters, its versatile enough to cover a wide range of hatches, trout will feed on these",
                'fish_species' => "Most trout species, especially brown",
                'tying' => "Soft hair and stiff bristles from a hare are wound around the shank of the hook and fastened with gold wire that suggests segmentation. Sometimes a gold bead head is added for weight and stability in the water and a strand of pheasant feather is added for a tail. The bead head can be fastened near the eye of the hook. This pattern is commonly tied on size 10 - 16 nymph hooks. Traditional colouring is a brown body with orange or brown thread.",
                'tactics' => "When this fly is immersed, the stiff fibers in the dubbing stand out and imitate the legs of an insect. Fish this lure below the surface with or without a small strike indicator and split-shot to help it sink. It is an effective pattern throughout the year because it covers a broad spectrum of prey that are active in every season.",
                'image' => "adams_irresistible.png",
                'fly_category_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => "Golden Dabbler",
                'description' => "The Barbless dabbler flies are very popular on the Irish Lochs, although the popularity and known success is now seeing them widely used across the board. We do have a great colour range in the dabbler flies and they are tied on a size 10 and 12 hook",
                'fish_species' => "Most trout species, especially brown",
                'tying' => "Soft hair and stiff bristles from a hare are wound around the shank of the hook and fastened with gold wire that suggests segmentation. Sometimes a gold bead head is added for weight and stability in the water and a strand of pheasant feather is added for a tail. The bead head can be fastened near the eye of the hook. This pattern is commonly tied on size 10 - 16 nymph hooks. Traditional colouring is a brown body with orange or brown thread.",
                'tactics' => "When this fly is immersed, the stiff fibers in the dubbing stand out and imitate the legs of an insect. Fish this lure below the surface with or without a small strike indicator and split-shot to help it sink. It is an effective pattern throughout the year because it covers a broad spectrum of prey that are active in every season.",
                'image' => "golder_dabbler.png",
                'fly_category_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => "Pink Bunny Leech",
                'description' => "The bunny leech flies are rabbit fur zonkers useful in still waters, trout just can't help themselves, fish with a jerky retrieve for cracking results.",
                'fish_species' => "Most trout species, especially brown",
                'tying' => "Soft hair and stiff bristles from a hare are wound around the shank of the hook and fastened with gold wire that suggests segmentation. Sometimes a gold bead head is added for weight and stability in the water and a strand of pheasant feather is added for a tail. The bead head can be fastened near the eye of the hook. This pattern is commonly tied on size 10 - 16 nymph hooks. Traditional colouring is a brown body with orange or brown thread.",
                'tactics' => "When this fly is immersed, the stiff fibers in the dubbing stand out and imitate the legs of an insect. Fish this lure below the surface with or without a small strike indicator and split-shot to help it sink. It is an effective pattern throughout the year because it covers a broad spectrum of prey that are active in every season.",
                'image' => "pink_bunny_leech.png",
                'fly_category_id' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => "Bibio Muddler",
                'description' => "The Muddler Minnow trout fly is probably one of the most versatile of trout fly patterns, muddler flies can be used on the surface or subsurface and is effective either way. Use them in all conditions, rivers lakes, streams and even the sea. The muddler head is made from deer hair which gives it buoyancy but using weights you can fish these at any depth.",
                'fish_species' => "Most trout species, especially brown",
                'tying' => "Soft hair and stiff bristles from a hare are wound around the shank of the hook and fastened with gold wire that suggests segmentation. Sometimes a gold bead head is added for weight and stability in the water and a strand of pheasant feather is added for a tail. The bead head can be fastened near the eye of the hook. This pattern is commonly tied on size 10 - 16 nymph hooks. Traditional colouring is a brown body with orange or brown thread.",
                'tactics' => "When this fly is immersed, the stiff fibers in the dubbing stand out and imitate the legs of an insect. Fish this lure below the surface with or without a small strike indicator and split-shot to help it sink. It is an effective pattern throughout the year because it covers a broad spectrum of prey that are active in every season.",
                'image' => "speckled_frog.png",
                'fly_category_id' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
        ];

        DB::table('flies')->insert($data);
    }
}
