<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WebshopController extends Controller
{
    
    public function index(Request $request)
    {
        $products = Product::paginate(8); 
    
        $hasMore = $products->hasMorePages(); // Controleer of er meer pagina's zijn
    
        if ($request->ajax()) {
            return response()->json([
                'products' => view('webshop._products', ['products' => $products])->render(),
                'hasMore' => $products->hasMorePages()
            ]);
        }
    
        return view('webshop.webshop', ['products' => $products]);
    }
    
    

    
    public function show($id)
    {
        $product = Product::findOrFail($id); 
        return view('webshop.show', compact('product')); 
    }

}
