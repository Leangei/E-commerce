<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    // Get all categories
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    // Create a new category
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::create($validated);
        return response()->json($category, 201);
    }

    // Get a single category
    public function show($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        return response()->json($category);
    }

    // Update a category
    public function update(Request $request, $categoryId)
    {
        $category = Category::findOrFail($categoryId);
        
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($validated);
        return response()->json($category);
    }

    // Delete a category
    public function destroy($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully'], 200);
    }

    // Get all products for a specific category
    public function products($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $products = $category->products;
        return response()->json($products);
    }
    
   
}