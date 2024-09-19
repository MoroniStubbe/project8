<?php

namespace App\Http\Controllers;

use App\Models\Faq; // Gebruik de juiste modelnaam 'Faq'
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
        ]);

        Faq::create([
            'message' => $request->input('message'),
            'answer' => $request->input('answer'),
        ]);

        return redirect()->back()->with('success', 'FAQ added successfully!');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'rmfaq' => 'required|integer|exists:faqs,id',
        ]);

        $faq = Faq::findOrFail($request->input('rmfaq'));
        $faq->delete();

        return redirect()->back()->with('success', 'FAQ deleted successfully!');
    }

    public static function show()
    {
        return Faq::all();
    }
}