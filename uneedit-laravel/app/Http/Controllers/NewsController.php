<?php

namespace App\Http\Controllers;

use App\Models\NewsModel;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    
    public function create(Request $request)
    {
        // Validate the request
        $request->validate([
            'addnew' => 'required|string|max:255',
        ]);

        // Create a new news item using NewsModel
        NewsModel::create([
            'message' => $request->input('addnew'),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'News added successfully!');
    }

    /**
     * Remove the specified news item from storage.
     */
    public function delete(Request $request)
    {
        // Validate the request
        $request->validate([
            'rmnew' => 'required|integer|exists:news,id',
        ]);

        // Find and delete the news item by ID
        $news = NewsModel::findOrFail($request->input('rmnew'));
        $news->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'News deleted successfully!');
    }
    public static function show(){
        return NewsModel::all();
    }
   
}
