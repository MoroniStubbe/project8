<?php

namespace App\Http\Controllers;

use App\Models\Request;
use Illuminate\Http\Request as HttpRequest; // Alias to avoid conflict

class RequestController extends Controller
{
    // Store a new request
    public function create(HttpRequest $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'device_type' => 'required|string|max:255',
            'device_name' => 'required|string|max:255',
            'problem'     => 'required|string|max:255',
            'telephone'   => 'required|string|max:255',
            'email'       => 'required|email|max:255',
        ]);

        // Create a new request entry
        $newRequest = Request::create($validated);

        return redirect()->route('request.view');
    }

    // Display all requests
    public static function showAll()
    {
        $requests = Request::all();

        echo "<table class='table1'>";
        foreach ($requests as $data) {
            echo "<tr>";
            echo "<td>" . $data["device_type"] . "</td>";
            echo "<td>" . $data["device_name"] . "</td>";
            echo "<td>" . $data["problem"] . "</td>";
            echo "<td>" . $data["email"] . "</td>";
            echo "<td>" . $data["telephone"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        return response()->json($requests);
    }

    // Delete a request by ID
    public function delete($id)
    {
        $request = Request::findOrFail($id);
        $request->delete();

        return response()->json(['message' => 'Request deleted successfully']);
    }
}
