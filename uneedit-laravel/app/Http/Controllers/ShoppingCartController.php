<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProductJunction;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    // Add product to cart
    public function addToCart(Request $request, $id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Get current cart from session
        $cart = session()->get('cart', []);

        // Check if the product is already in the cart
        $junctionId = null;

        // Search for the existing junction
        foreach ($cart as $existingJunctionId) {
            $junction = OrderProductJunction::find($existingJunctionId);
            if ($junction && $junction->product_id == $product->id) {
                $junctionId = $existingJunctionId;
                break;
            }
        }

        if ($junctionId) {
            // If the junction exists, increment the quantity
            $junction = OrderProductJunction::find($junctionId);
            $junction->quantity++; // Assuming you have a quantity column
            $junction->save();
            return redirect()->route('view');
        } else {
        // If the junction does not exist, create a new junction record
        $junction = OrderProductJunction::create([
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        // Store the junction in the session for the active cart
        session()->push('cart', $junction->id);

        return redirect()->route('view');
    }
}

    // View shopping cart
    public function viewCart()
    {
        // Retrieve cart session or an empty array if it doesn't exist
        $cart = session()->get('cart', []);

        // If cart is not empty, retrieve the products in the cart using the junction model
        $productsInCart = $cart ? OrderProductJunction::whereIn('id', $cart)->with('product')->get() : collect();

        // Pass the $productsInCart to the shopping_cart view
        return view('webshop.shopping_cart', compact('productsInCart'));
    }

    public function removeFromCart($id)
    {
        // Retrieve the current cart from the session
        $cart = session()->get('cart', []);

        // Remove the product's junction ID from the session cart array
        if (($key = array_search($id, $cart)) !== false) {
            unset($cart[$key]);
        }

        // Update the session with the new cart array
        session()->put('cart', $cart);

        // Optionally, delete the junction record from the database
        OrderProductJunction::destroy($id);

        return redirect()->route('view');
    }

    // Checkout logic
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Cart is empty!');
        }

        // Create a new order
        $order = Order::create([
            'order_product_junction_id' => auth()->id(),
        ]);

        // Loop through cart and save each product with quantity (if relevant) to junction table
        foreach ($cart as $junctionId) {
            $junction = OrderProductJunction::find($junctionId);
            if ($junction) {
                // Store product details for the order
                $order->products()->attach($junction->product_id, ['quantity' => $junction->quantity]);
            }
        }

        // Clear the cart session
        session()->forget('cart');

        return redirect()->route('index');
    }
}