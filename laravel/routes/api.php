<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Category Routes
Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{categoryId}', [CategoryController::class, 'show']);
Route::patch('/categories/{categoryId}', [CategoryController::class, 'update']);
Route::delete('/categories/{categoryId}', [CategoryController::class, 'destroy']);

// Product Routes
Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{productId}', [ProductController::class, 'show']);
Route::patch('/products/{productId}', [ProductController::class, 'update']);
Route::delete('/products/{productId}', [ProductController::class, 'destroy']);

// Get all products by category
Route::get('/categories/{categoryId}/products', [CategoryController::class, 'products']);

Route::post('/login', function (Request $request) {
    $request->validate(['email'=>'required|email','password'=>'required']);

    if (!Auth::attempt($request->only('email','password'))) {
        return response()->json(['message'=>'Invalid credentials'], 401);
    }

    $user = $request->user();
    $token = $user->createToken('mobile')->accessToken;

    return response()->json(['token'=>$token]);
});

Route::middleware('auth:api')->group(function () {
    Route::get('/me', fn(Request $r) => $r->user()->load('roles'));
});


Route::post('/authors', [AuthorController::class, 'store']);
