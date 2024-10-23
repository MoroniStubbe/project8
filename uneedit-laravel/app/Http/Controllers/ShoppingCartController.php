<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProductJunction;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    // Add product to cart (session)
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        // Fetch the cart from session or create an empty array
        $cart = session()->get('cart', []);

        // Check if the product already exists in the cart
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;  // Increment quantity if it exists
        } else {
            // Add product to the cart
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1
            ];
        }

        // Save the updated cart back to the session
        session()->put('cart', $cart);

        return redirect()->back();
    }

    // Show the shopping cart
    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('shopping_cart', compact('cart'));
    }

    // Proceed to checkout
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (!$cart) {
            return redirect()->route('webshop.index');
        }

        // Create a new order
        $order = Order::create();

        // Add products to the order
        foreach ($cart as $productId => $details) {
            $order->products()->attach($productId, ['quantity' => $details['quantity']]);
        }

        // Clear the cart session
        session()->forget('cart');

        return redirect()->route('webshop.index');
    }
}