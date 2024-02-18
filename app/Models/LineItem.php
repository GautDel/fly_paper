<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LineItem extends Model
{

    public function shopOrder(): BelongsTo {
        return $this->belongsTo(ShopOrder::class);
    }

    public function productEntry(): HasOne {
        return $this->hasOne(ProductEntry::class, 'id', 'product_entry_id');
    }

    public function product(): HasOne {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
