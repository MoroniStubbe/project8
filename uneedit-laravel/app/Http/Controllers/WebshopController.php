<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WebshopController extends Controller
{
    
    public function index(Request $request)
    {
        $products = Product::paginate(8); // 8 products per page
    
        // Check if the request is an AJAX call
        if ($request->ajax()) {
            // Return the _products view with the paginated products
            return view('webshop._products', ['products' => $products]);
        }
    
        // Return the main webshop view for non-AJAX requests
        return view('webshop.webshop', ['products' => $products]);
    }

    // Toon details van een specifiek product
    public function show($id)
    {
        $product = Product::findOrFail($id); // Product ophalen op basis van ID
        return view('webshop.show', compact('product')); // Passeren naar productdetail view
    }

    // Voeg product toe aan de winkelwagen
    public function addToCart($id)
    {
        $product = Product::findOrFail($id); // Haal het product op
        $cart = session()->get('cart', []); // Haal de winkelwagen op uit de sessie

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++; // Verhoog de hoeveelheid als het product al in de winkelwagen zit
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->picture,
            ];
        }

        session()->put('cart', $cart); // Zet de bijgewerkte winkelwagen terug in de sessie
        return redirect()->route('webshop.index')->with('success', 'Product toegevoegd aan winkelwagen!');
    }

    // Toon de winkelwagen
    public function cart()
    {
        $cart = session()->get('cart', []); // Haal de winkelwagen op uit de sessie
        return view('webshop.cart', compact('cart')); // Toon de winkelwagen
    }

    // Verwijder product uit winkelwagen
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]); // Verwijder het product uit de winkelwagen
            session()->put('cart', $cart); // Zet de bijgewerkte winkelwagen terug in de sessie
        }

        return redirect()->route('webshop.cart')->with('success', 'Product verwijderd uit winkelwagen!');
    }

    // Plaats een bestelling
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (count($cart) == 0) {
            return redirect()->route('webshop.index')->with('error', 'Je winkelwagen is leeg!');
        }

        $order = new Order();
        $order->user_id = auth()->id(); // Verondersteld dat je gebruikersauthenticatie hebt
        $order->total = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);
        $order->save(); // Bestelling opslaan

        // Voeg producten toe aan de bestelling
        foreach ($cart as $id => $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Leeg de winkelwagen na bestelling
        session()->forget('cart');

        return redirect()->route('webshop.index')->with('success', 'Bestelling geplaatst!');
    }
}