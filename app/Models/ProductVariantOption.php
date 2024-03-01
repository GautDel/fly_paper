<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductVariantOption extends Model
{
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function variant(): BelongsTo
    {
        return $this->belongsTo(VariationOption::class, 'variation_option_id', 'id');
    }

}
