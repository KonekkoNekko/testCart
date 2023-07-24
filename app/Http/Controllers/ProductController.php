<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    function index()
    {
        $products = Product::all();

        return view('product', ['products' => $products]);
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Use the username if logged in, 'guest' if not
        $identifier = auth()->check() ? auth()->user()->username : 'guest';

        Cart::instance($identifier)->add([
            'id' => $product->id,
            'name' => $product->product_album,
            'qty' => 1,
            'price' => $product->product_price,
            'options' => [
                'artist' => $product->product_artist,
                // Add more options as needed
            ]
        ]);

        return redirect()->back()->with('success', 'Item added to cart.');
    }
}
