<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        // Hash the password
        $validated['password'] = bcrypt($validated['password']);

        // Create the user
        User::create($validated);

        // Redirect or return a response
        return redirect()->route('index')->with('success', 'User created successfully.');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $credentials = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // If login is successful, redirect to the intended route or dashboard
            return redirect()->intended('/')->with('success', 'You are logged in!');
        }

        // If authentication fails, redirect back with an error message
        return redirect()->back()->with('error', 'Invalid email or password.');
    }
}
