<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CartController extends Controller
{
    public function index()
    {
        $cart = Auth::user()->cart;
        return Inertia::render('Cart/Index', [
            'cart' => $cart,
        ]);
    }

    public function addItem(Request $request)
    {
        $cart = auth()->user()->cart;
        $cart->items()->create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);
        return redirect()->back();
    }

    public function updateItem(Request $request, CartItem $item)
    {
        $item->update(['quantity' => $request->quantity]);
        return redirect()->back();
    }

    public function removeItem(CartItem $item)
    {
        $item->delete();
        return redirect()->back();
    }
}
