<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductVariation extends Model
{
    public function category(): BelongsTo {
        return $this->belongsTo(ProductCategory::class);
    }

    public function options(): HasMany {
        return $this->hasMany(VariationOption::class);
    }
}
