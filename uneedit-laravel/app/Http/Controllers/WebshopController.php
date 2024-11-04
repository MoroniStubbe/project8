<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WebshopController extends Controller
{
    
    public function index(Request $request)
    {
        $products = Product::paginate(10); 
        $hasMore = $products->hasMorePages(); 
    
        if ($request->ajax()) {
            return response()->json([
                'products' => view('webshop._products', ['products' => $products])->render(),
                'hasMore' => $products->hasMorePages()
            ]);
        }
    
        return view('webshop.webshop', ['products' => $products]);
    }
}
