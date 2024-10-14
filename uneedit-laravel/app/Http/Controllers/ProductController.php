<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show()
    {
        // Retrieve all products and convert them to an array
        $table_data = Product::all()->toArray();

        // Define the action URL for the form submission
        $action = route('index'); // @TODO Update this route name

        // Return the view with the products table_data
        return view('admin.add_product', compact('table_data', 'action'));
    }

    public function create(Request $request)
    {
        // Validate the input data with default values
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'price' => 'numeric|min:0',
            'description' => 'nullable|string',
            'stock' => 'integer|min:0',
            'type' => 'string|max:255',
            'picture' => 'string|max:255',
        ]);

        // Create a new product instance
        $product = new Product();
        $product->name = $validatedData['name'] ?? ''; // Default to empty string if null
        $product->price = $validatedData['price'] ?? 0; // Default to 0 if null
        $product->description = $validatedData['description'] ?? ''; // Default to empty string if null
        $product->stock = $validatedData['stock'] ?? 0; // Default to 0 if null
        $product->type = $validatedData['type'] ?? ''; // Default to 0 if null
        $product->picture = $validatedData['picture'] ?? ''; // Default to 0 if null

        // Save the new product to the database
        $product->save();

        return response()->json(['message' => 'Product created successfully.', 'product' => $product], 201);
    }

    public function destroy($id)
    {
        // Find the row by ID and delete it
        $row = Product::find($id);

        if ($row) {
            $row->delete();
            return response()->json(['message' => 'Row deleted successfully.'], 200);
        }

        return response()->json(['message' => 'Row not found.'], 404);
    }

    public function update(Request $request)
    {
        // Validate the input data
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

            // Save the changes
            $product->save();

            return response()->json(['message' => 'Product updated successfully.'], 200);
        }

        // If product is not found, return a 404 response
        return response()->json(['message' => 'Product not found.'], 404);
    }
}
