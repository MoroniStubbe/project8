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

    // Toggle update mode for product in cart (session)
    public function toggleUpdateMode($id)
    {
        // Fetch the edit mode status from session, or create an empty array
        $editMode = session()->get('editMode', []);

        // Toggle the edit mode for the specific product
        if (isset($editMode[$id])) {
            unset($editMode[$id]);  // Turn off edit mode if it's already on
        } else {
            $editMode[$id] = true;   // Turn on edit mode for this product
        }

        // Save the updated edit mode back to the session
        session()->put('editMode', $editMode);

        return redirect()->back();
    }

    // Update quantity of product in cart (session)
    public function updateCart(Request $request, $id)
    {
        // Validate the quantity input
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        // Fetch the cart from session
        $cart = session()->get('cart', []);

        // Check if the product exists in the cart
        if (isset($cart[$id])) {
            // Update the product quantity
            $cart[$id]['quantity'] = $request->input('quantity');
            
            // Save the updated cart back to the session
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cart updated successfully.');
    }

    // Remove product from cart (session)
    public function removeFromCart($id)
    {
        // Fetch the cart from session
        $cart = session()->get('cart', []);

        // Check if the product exists in the cart
        if (isset($cart[$id])) {
            // Remove the product from the cart
            unset($cart[$id]);
            // Save the updated cart back to the session
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart successfully.');
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