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
}
