<?php

namespace App\View\Components;

use App\Models\CartItem;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (Auth::check()) {
            $cartItems = CartItem::where('shopping_cart_id', 1)->count();
            $user = Auth::user();
            return view('components.header',[
                'username' => $user->name,
                'cartItems' => $cartItems,
            ]);
        }

        return view('components.header');
    }
}
