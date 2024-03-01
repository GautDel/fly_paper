<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'in_stock',
        'new',
        'sale',
        'sale_percent',
        'brand',
        'product_category_id'
    ];

    public static function suggested(int $amount, int $categoryId) {

        $posts = self::where('product_category_id', $categoryId)
                       ->latest()
                       ->take($amount)
                       ->get();

        return $posts;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class,'product_category_id', 'id');
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(ProductRating::class);
    }

    public function productEntry():HasMany {
        return $this->hasMany(ProductEntry::class);
    }

    public function avgRating($productId) {
        return ProductRating::where('product_id', $productId)->avg('rating');
    }

    public function getImage() {
        return Storage::url($this->image);
    }

    public function options(): HasMany
    {
        return $this->hasMany(ProductVariantOption::class, 'product_id', 'id');
    }

}


