<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
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
            $cart[$id]['quantity']++;
        } else {
            // Add product to the cart
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'picture' => $product->picture,
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

        return redirect()->back();
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

        session()->put('orderId', $order->id);

        // Redirect to delivery service page with the order ID
        return redirect()->route('delivery_services', ['order' => $order->id]);
    }

    // Save delivery information
    public function saveDeliveryInfo($orderId, Request $request)
    {
        $orderId = session()->get('orderId', []);

        // Validate the request data
        $request->validate([
            'delivery_service' => 'required|string',
            'delivery_date' => 'required|date',
            'delivery_time' => 'required|date_format:H:i'
        ]);

        // Find the order
        $order = Order::findOrFail($orderId);

        // Save the delivery information
        $order->update([
            'delivery_service' => $request->input('delivery_service'),
            'delivery_date' => $request->input('delivery_date'),
            'delivery_time' => $request->input('delivery_time'),
        ]);

        return view('delivery_services', compact('orderId'));
    }
}