<?php

namespace App\Http\Controllers;

use App\Models\LineItem;
use App\Models\Product;
use App\Models\ShopOrder;
use App\Models\ShoppingCart;
use Throwable;
use Validator;
use App\Models\CartItem;
use App\Models\ProductEntry;
use App\Models\ProductVariation;
use App\Models\ShippingAddress;
use App\Models\VariationOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public static function render()
    {
        $cart = ShoppingCart::where('user_id', Auth::user()->id)->first();
        if ($cart) {

            $skuItems = CartItem::where('shopping_cart_id', $cart->id)
                ->with('product')
                ->with('productEntry')
                ->get();
        } else {
            $skuItems = [];
        }

        $total = 0.00;

        foreach ($skuItems as $item) {
            $item->variants = self::getVariants($item->productEntry->sku);
            $total += $item->product->price * $item->qty;
        }

        return view('cart', [
            'items' => $skuItems,
            'total' => $total,
        ]);
    }

    public static function shippingView()
    {

        $cart = ShoppingCart::where('user_id', Auth::user()->id)->first();

        if(!$cart) {
            return redirect('/cart');
        }

        $cartItems = CartItem::where('shopping_cart_id', $cart->id)->count();

        $shippingAddresses = ShippingAddress::where('user_id', Auth::user()->id)
            ->get();

        if ($shippingAddresses === null) {

            return view('shipping');
        }

        if ($cartItems === 0) {
            return redirect('/cart');
        }

        return view('shipping', ['shippingAddresses' => $shippingAddresses]);
    }

    public static function checkoutView(Request $request)
    {
        if ($request->address_id === null) {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|min:2|max:255',
                'last_name' => 'required|min:2|max:255',
                'address_1' => 'required|min:2|max:255',
                'city' => 'required|min:2|max:255',
                'state_province' => 'required|min:2|max:255',
                'zip' => 'required|min:5|max:255',
                'country' => 'required|min:5|max:255',
            ]);

            if ($validator->fails()) {
                return redirect("/cart/shipping")
                    ->withErrors($validator)
                    ->withInput();
            }
        }


        $shippingAddress = ShippingAddress::firstOrCreate(
            [
                'id' => $request->address_id
            ],
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address_1' => $request->address_1,
                'city' => $request->city,
                'state_province' => $request->state_province,
                'zip' => $request->zip,
                'country' => $request->country,
                'user_id' => Auth::user()->id,
            ]
        );

        $cart = ShoppingCart::where('user_id', Auth::user()->id)->first();
        $cartItems = CartItem::where('shopping_cart_id', $cart->id)->get();
        $total = 0;

        foreach ($cartItems as $cartItem) {
            $total += $cartItem->product->price * $cartItem->qty;
        }

        if ($cartItems === 0) {
            return redirect('/cart');
        }

        return view('checkout', [
            'cartItems' => $cartItems,
            'shippingAddress' => $shippingAddress,
            'total' => $total
        ]);
    }

    public static function checkout(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_KEY'));
        $cart = ShoppingCart::where('user_id', Auth::user()->id)->first();
        $cartItems = CartItem::where('shopping_cart_id', $cart->id)->get();
        $lineItems = [];
        $totalPrice = 0;

        foreach ($cartItems as $cartItem) {

            $totalPrice += $cartItem->product->price * $cartItem->qty;

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $cartItem->product->name
                    ],
                    'unit_amount' => $cartItem->product->price * 100,
                ],
                'quantity' => $cartItem->qty
            ];
        }

        $checkoutSession = $stripe->checkout->sessions->create([
            'line_items' => [$lineItems],
            'mode' => 'payment',
            'success_url' => 'http://192.168.1.15/checkout/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => 'http://192.168.1.15/cart/checkout',
        ]);

        $cart = ShoppingCart::where('user_id', Auth::user()->id)->first();
        $shippingAddress = ShippingAddress::where('id', $request->addressId)->first();

        ShopOrder::updateOrCreate(
            ['shopping_cart_id' => $cart->id],
            [
                'status' => 'unpaid',
                'first_name' => $shippingAddress->first_name,
                'last_name' => $shippingAddress->last_name,
                'address_1' => $shippingAddress->address_1,
                'address_2' => $shippingAddress->address_2,
                'city' => $shippingAddress->city,
                'state_province' => $shippingAddress->state_province,
                'zip' => $shippingAddress->zip,
                'country' => $shippingAddress->country,
                'total_price' => $totalPrice,
                'session_id' => $checkoutSession->id,
                'shipping_address_id' => $request->addressId,
                'user_id' => Auth::user()->id,
            ]
        );


        return response()->json([
            'clientSecret' => $checkoutSession->url
        ]);
    }

    public static function success()
    {

        $stripe = new \Stripe\StripeClient(env('STRIPE_KEY'));

        try {
            $session = $stripe->checkout->sessions->retrieve($_GET['session_id']);

            if (!$session) {
                abort(404);
            }

            $customer = $session->customer_details;

            $order = ShopOrder::where('session_id', $session->id)
                ->where('status', 'unpaid')
                ->first();
            if (!$order) {
                abort(404);
            }

            $order->update(['status' => 'paid']);
            $cartItems = CartItem::where('shopping_cart_id', $order->shopping_cart_id)->get();
            $lineItems = [];

            foreach($cartItems as $item) {
                $lineItems[] = [
                    'shop_order_id' => $order->id,
                    'product_entry_id' => $item->product_entry_id,
                    'product_id' => $item->product_id,
                    'qty' => $item->qty,
                ];

                $item->productEntry->qty = $item->productEntry->qty - $item->qty;
                $item->productEntry->save();
            };

            LineItem::insert($lineItems);
            ShoppingCart::destroy($order->shopping_cart_id);
            $items = LineItem::where('shop_order_id', $order->id)->get();

            return view('success', [
                'customer' => $customer,
                'order' => $order,
                'items' => $items,
            ]);
        } catch (Throwable $e) {
            abort(404);
        }
    }

    public static function cancel()
    {

        return view('cancel');
    }

    private static function generateSKU($data): string
    {
        $sku = "";

        foreach ($data as $key => $value) {

            if ($key === '_token') {
                continue;
            }

            if ($key === 'quantity') {
                continue;
            }

            $sku = $sku . $value . '-';
        }

        $sku = rtrim($sku, '-');
        return $sku;
    }

    private static function getVariants($sku)
    {
        $sku = explode('-', $sku);

        $variants = collect();

        foreach ($sku as $key => $value) {
            if ($key < 1) continue;
            $variants->push(VariationOption::where('value', $value)->with('variation')->first());
        }

        return $variants;
    }

    public static function destroyItem(Request $request)
    {
        CartItem::destroy($request->id);

        return redirect('/cart');
    }

    public static function updateCart(Request $request)
    {
        CartItem::where('id', $request->id)
            ->update(['qty' => $request->qty]);

        return redirect('/cart');
    }

    public static function cart(Request $request)
    {
        $cart = ShoppingCart::firstOrCreate(
            [
                'user_id' => Auth::user()->id
            ],
            [
                'user_id' => Auth::user()->id
            ]
        );

        $sku = self::generateSKU($request->all());

        $skuProduct = ProductEntry::where('sku', $sku)->first();

        // Check if product exists
        if(!$skuProduct)  {
            return redirect("/market/product/$request->product_id")->with('error', 'Product does not exist');
        }

        // Check if in stock
        if($skuProduct->qty <= 0) {

            return redirect("/market/product/$request->product_id")->with('error', 'Product is out of stock');
        }

        $product = Product::where('id', $request->product_id)->with('ratings')->first();

        $variations = ProductVariation::where('product_category_id', $product->product_category_id)
            ->with('options')->get();


        $cartItem = CartItem::where('product_entry_id', $skuProduct->id)->first();

        if ($cartItem) {
            $cartItem->qty = $cartItem->qty + $request->quantity;
            $cartItem->save();
        } else {
            $cartItem = CartItem::create([
                'product_entry_id' => $skuProduct->id,
                'product_id' => $request->product_id,
                'shopping_cart_id' => $cart->id,
                'qty' => $request->quantity
            ]);
        }

        return redirect('/market')->with('message', Str::upper($cartItem->product->name) . ' added to cart');
    }
}
