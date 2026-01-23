<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'author_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:users,name',
            'password' => 'nullable|string|min:6' // optional password
        ]);

        $user = User::create([
            'name' => $validated['user_name'],
            'email' => $validated['user_name'].'@example.com', // example email
            'password' => Hash::make($validated['password'] ?? 'password123'), // default password
        ]);

        $author = Author::create([
            'name' => $validated['author_name'],
            'user_id' => $user->id,
        ]);

        return response()->json([
            'message' => 'Author and user created successfully',
            'author' => $author,
            'user' => $user
        ], 201);
    }
}
