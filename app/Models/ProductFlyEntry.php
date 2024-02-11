<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductFlyEntry extends Model
{
    public function hookSizes(): HasMany
    {
        return $this->hasMany(ProductHookSize::class);
    }

    public function flyColors(): HasMany
    {
        return $this->hasMany(ProductFlyColors::class);
    }
}
