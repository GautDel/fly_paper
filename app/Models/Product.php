<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(ProductRating::class);
    }


    public function avgRating($productId) {
        return ProductRating::where('product_id', $productId)->avg('rating');
    }
}


