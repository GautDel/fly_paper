<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductHookSize extends Model
{
    public function flyEntry(): HasMany
    {
        return $this->hasMany(ProductFlyEntry::class);
    }
}
