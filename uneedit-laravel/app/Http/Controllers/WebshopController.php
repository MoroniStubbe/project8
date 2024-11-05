<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Webshop;
use Illuminate\Http\Request;

class WebshopController extends Controller
{
    public function index(Request $request)
    {
        $products = Webshop::paginate(10); 
        $hasMore = $products->hasMorePages(); 
    
        if ($request->ajax()) {
            return response()->json([
                'products' => view('webshop._products', ['products' => $products])->render(),
                'hasMore' => $hasMore
            ]);
        }
    
        return view('webshop.webshop', ['products' => $products]);
    }
}
