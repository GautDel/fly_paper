<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductEntry extends Model
{

    protected $fillable = [
        'product_id',
        'sku',
        'qty',
    ];
    public function cartItem():HasMany {
        return $this->hasMany(CartItem::class);
    }

    public function product():HasMany {
        return $this->hasMany(Product::class);
    }

    public function getVariants($sku)
    {
        $sku = explode('-', $sku);

        $variants = collect();

        foreach ($sku as $key => $value) {
            if ($key < 1) continue;
            $variants->push(VariationOption::where('value', $value)->with('variation')->first());
        }

        return $variants;
    }

}
