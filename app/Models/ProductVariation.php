<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductVariation extends Model
{
    protected $fillable = [
        'name',
        'product_category_id',
    ];

    public function category(): BelongsTo {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function options(): HasMany {
        return $this->hasMany(VariationOption::class);
    }
}
