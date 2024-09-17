<?php

namespace App\Http\Controllers;

use App\Models\NewsModel;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    
    public function create(Request $request)
    {
        $request->validate([
            'addnew' => 'required|string|max:255',
        ]);

        NewsModel::create([
            'message' => $request->input('addnew'),
        ]);

        return redirect()->back()->with('success', 'News added successfully!');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'rmnew' => 'required|integer|exists:news,id',
        ]);

        $news = NewsModel::findOrFail($request->input('rmnew'));
        $news->delete();

        return redirect()->back()->with('success', 'News deleted successfully!');
    }
    public static function show(){
        return NewsModel::all();
    }
   
}
