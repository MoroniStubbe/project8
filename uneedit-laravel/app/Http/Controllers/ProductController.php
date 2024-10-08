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

    public function save(Request $request, $id)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
        ]);

        // Find the product by its ID
        $product = Product::find($id);

        // If the product exists, update its attributes
        if ($product) {
            $product->name = $validatedData['name'];
            $product->price = $validatedData['price'];
            $product->description = $validatedData['description'] ?? $product->description;
            $product->stock = $validatedData['stock'];

            // Save the changes
            $product->save();

            return response()->json(['message' => 'Product updated successfully.'], 200);
        }

        // If product is not found, return a 404 response
        return response()->json(['message' => 'Product not found.'], 404);
    }
}
