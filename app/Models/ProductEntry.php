<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductEntry extends Model
{
    public function cartItem():HasMany {
        return $this->hasMany(CartItem::class);
    }

    public function product():HasMany {
        return $this->hasMany(Product::class);
    }

}
