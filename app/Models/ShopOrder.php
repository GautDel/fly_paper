<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShopOrder extends Model
{
    protected $fillable = [
        'status',
        'first_name',
        'last_name',
        'address_1',
        'address_2',
        'city',
        'state_province',
        'zip',
        'country',
        'total_price',
        'shipping_address_id',
        'user_id',
        'shopping_cart_id',
        'session_id'
    ];

    public function lineItems(): HasMany {
        return $this->hasMany(LineItem::class);
    }
}
