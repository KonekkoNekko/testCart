<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function showCart()
    {
        // Use the username if logged in, 'guest' if not
        $identifier = Auth::check() ? Auth::user()->username : 'guest';

        // Restore the cart from the database (if exists) before showing the cart
        // Cart::instance($identifier)->restore($identifier);

        $cartContent = Cart::instance($identifier)->content();

        return view('cart', compact('cartContent'));
    }

    public function deleteItem(Request $request, $rowId)
    {
        // Use the username if logged in, 'guest' if not
        $identifier = Auth::check() ? Auth::user()->username : 'guest';

        Cart::instance($identifier)->remove($rowId);

        return redirect()->back()->with('success', 'Item removed from cart.');
    }

    public function updateQuantity(Request $request, $rowId)
    {
        // Use the username if logged in, 'guest' if not
        $identifier = Auth::check() ? Auth::user()->username : 'guest';

        Cart::instance($identifier)->update($rowId, $request->quantity);

        // Store the cart in the database after updating the quantity
        // Cart::instance($identifier)->store($identifier);

        return redirect()->back()->with('success', 'Cart updated successfully.');
    }

    // public function storeCart(Request $request)
    // {
    //     // Use the username if logged in, 'guest' if not
    //     $identifier = Auth::check() ? Auth::user()->username : 'guest';

    //     // Store the cart in the database
    //     Cart::instance($identifier)->store($identifier);

    //     return redirect()->back()->with('success', 'Cart stored successfully.');
    // }

    // public function restoreCart(Request $request)
    // {
    //     // Use the username if logged in, 'guest' if not
    //     $identifier = Auth::check() ? Auth::user()->username : 'guest';

    //     // Restore the cart from the database
    //     Cart::instance($identifier)->restore($identifier);

    //     return redirect()->back()->with('success', 'Cart restored successfully.');
    // }

    public function destroyCart()
    {
        // Use the username if logged in, 'guest' if not
        $identifier = Auth::check() ? Auth::user()->username : 'guest';

        Cart::instance($identifier)->destroy();

        // Store the cart in the database after destroying it
        // Cart::instance($identifier)->store($identifier);

        return redirect()->back()->with('success', 'Cart destroyed successfully.');
    }
}
