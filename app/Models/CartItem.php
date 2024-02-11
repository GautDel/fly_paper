<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CartItem extends Model
{
    protected $fillable = [
        'product_entry_id',
        'product_id',
        'shopping_cart_id',
        'qty'
    ];

    public function productEntry(): HasOne {
        return $this->hasOne(ProductEntry::class, 'id', 'product_entry_id');
    }

    public function product(): HasOne {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
