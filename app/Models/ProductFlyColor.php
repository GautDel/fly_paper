<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductFlyColors extends Model
{
    public function flyEntry(): HasMany
    {
        return $this->hasMany(ProductFlyEntry::class);
    }
}
