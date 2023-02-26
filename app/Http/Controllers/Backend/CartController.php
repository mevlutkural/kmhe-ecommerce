<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Category;

class CartController extends Controller
{
    public function index()
    {
        $customerId = session()->has('customer') ? session()->get('customer')->customer_id : 0;
        $carts = Cart::where('customer_id', $customerId)->get();
        $categories = Category::where('is_active', '1')->get();

        return view('frontend.carts.index', ['carts' => $carts, 'categories' => $categories]);
    }

    public function addToCart(Request $req)
    {
        $cart = new Cart();
        $cart->fill($req->all());
        $cart->save();

        return response('success');
    }

    public function deleteCartItem(Cart $cart)
    {
        $cart->delete();

        return response('success');
    }
}
