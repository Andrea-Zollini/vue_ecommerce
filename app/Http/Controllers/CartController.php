<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
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

    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        dd($product);
    }
}
