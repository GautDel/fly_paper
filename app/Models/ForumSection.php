<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class ForumSection extends Model
{
    use HasFactory;

    public static function findAll() {
        $sections = ForumSection::get();

        return $sections;
    }

    public static function findBySlug(string $slug) {

        $section = ForumSection::where('slug', $slug)->first();

        return $section;
    }

    public function posts(): HasMany {
        return $this->hasMany(ForumPost::class);
    }
}

