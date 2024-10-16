<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Toon alle producten in de webshop
    public function index()
    {
        // Haal alle producten op uit de database
        $products = Product::all();

        // Geef de producten door aan de webshop view
        return view('webshop.webshop', compact('products'));
    }

    // Toon het formulier om producten toe te voegen in de admin sectie
    public function show($id)
    {
        $product = Product::findOrFail($id); // Find product by ID
        return view('webshop.product', compact('product')); // Pass the product to the view
    }

    // Product aanmaken
    public function create(Request $request)
    {
        // Valideer de input data
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'price' => 'numeric|min:0',
            'description' => 'nullable|string',
            'stock' => 'integer|min:0',
            'type' => 'string|max:255',
            'picture' => 'string|max:255',
        ]);

        // Maak een nieuw product aan
        $product = new Product();
        $product->name = $validatedData['name'] ?? '';
        $product->price = $validatedData['price'] ?? 0;
        $product->description = $validatedData['description'] ?? '';
        $product->stock = $validatedData['stock'] ?? 0;
        $product->type = $validatedData['type'] ?? '';
        $product->picture = $validatedData['picture'] ?? '';

        // Sla het product op in de database
        $product->save();

        return response()->json(['message' => 'Product created successfully.', 'product' => $product], 201);
    }

    // Verwijder een product
    public function destroy($id)
    {
        // Vind het product op basis van ID en verwijder het
        $row = Product::find($id);

        if ($row) {
            $row->delete();
            return response()->json(['message' => 'Row deleted successfully.'], 200);
        }

        return response()->json(['message' => 'Row not found.'], 404);
    }

    public function update(Request $request)
    {
        // Valideer de input data
        $validatedData = $request->validate([
            'type' => 'string|max:255',
            'name' => 'string|max:255',
            'price' => 'numeric|min:0',
            'picture' => 'string|max:255',
            'stock' => 'integer|min:0',
            'description' => 'nullable|string|max:255',
            'order_product_id' => 'integer|min:0',
        ]);
        // Find the product by its ID
        $product = Product::find($request->id);


        // If the product exists, update its attributes
        if ($product) {
            $product->type = $validatedData['type'];
            $product->name = $validatedData['name'];
            $product->price = $validatedData['price'];
            $product->picture = $validatedData['picture'];
            $product->stock = $validatedData['stock'];
            $product->description = $validatedData['description'];
            $product->order_product_id = $validatedData['order_product_id'];

            // Sla de wijzigingen op
            $product->save();

            return response()->json(['message' => 'Product updated successfully.'], 200);
        }

        // Product niet gevonden
        return response()->json(['message' => 'Product not found.'], 404);
    }
}