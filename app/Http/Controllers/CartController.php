<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductEntry;
use App\Models\VariationOption;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public static function render() {
        $skuItems = CartItem::where('shopping_cart_id', 1)
                              ->with('product')
                              ->with('productEntry')
                              ->get();
        $total = 0.00;

        foreach($skuItems as $item) {
            $item->variants = self::getVariants($item->productEntry->sku);
            $total += $item->product->price * $item->qty;
        }


        return view('cart', [
            'items' => $skuItems,
            'total' => $total,
        ]);
    }

    private static function generateSKU($data): string {
        $sku = "";

        foreach($data as $key => $value) {

            if($key === '_token') {
                continue;
            }

            if($key === 'quantity') {
                continue;
            }

            $sku = $sku.$value.'-';

        }

        $sku = rtrim($sku, '-');
        return $sku;
    }

    private static function getVariants($sku) {
        $sku = explode('-', $sku);

        $variants = collect();

        foreach ($sku as $key => $value) {
            if ($key < 1) continue;
            $variants->push(VariationOption::where('value', $value)->with('variation')->first());
        }

        return $variants;
    }

    public static function cart(Request $request) {
        $sku = self::generateSKU($request->all());
        $skuProduct = ProductEntry::where('sku', $sku)->first();

        $oldItem = CartItem::where('product_entry_id', $skuProduct->id)->first();

        if($oldItem) {
            $oldItem->qty = $oldItem->qty + $request->quantity;
            $oldItem->save();
        } else {
            CartItem::create([
                'product_entry_id' => $skuProduct->id,
                'product_id' => $request->product_id,
                'shopping_cart_id' => 1,
                'qty' => $request->quantity
            ]);
        }

        return redirect('/market');
    }
}
