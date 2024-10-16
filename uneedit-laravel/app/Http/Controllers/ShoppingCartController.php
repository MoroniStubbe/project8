<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProductJunction;
use Illuminate\Support\Facades\DB;

class ShoppingCartController extends Controller
{
    // Show the shopping cart
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('shopping_cart', compact('cart'));
    }

    // Add a product to the shopping cart
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        // Check if the product is in stock
        if ($product->stock < 1) {
            return redirect()->back()->with('error', 'Product is out of stock!');
        }

        // Check if the product already exists in the cart
        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] < $product->stock) {
                $cart[$id]['quantity']++;
            } else {
                return redirect()->back()->with('error', 'Cannot add more of this product. Not enough stock!');
            }
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'picture' => $product->picture,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // Remove a product from the shopping cart
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }

    // Create an order from the shopping cart
    public function createOrder(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('shopping_cart.index')->with('error', 'Your cart is empty.');
        }

        DB::transaction(function () use ($cart) {
            // Create a new order
            $order = Order::create();

            // Create the junction records
            foreach ($cart as $id => $product) {
                OrderProductJunction::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                ]);
            }
        });

        // Clear the cart
        session()->forget('cart');

        return redirect()->route('shopping_cart.index')->with('success', 'Your order has been placed successfully!');
    }
}