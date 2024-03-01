<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VariationOption extends Model
{
    protected $fillable = [
        'value',
        'product_variation_id',
    ];


    public function variation(): BelongsTo {
        return $this->belongsTo(ProductVariation::class, 'product_variation_id');
    }
}
