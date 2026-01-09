<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ----------------- PRODUCT ROUTES -----------------

Route::middleware(['auth'])->group(function () {

    // Create product routes
    Route::get('/products/create', [ProductController::class, 'create'])
        ->middleware('can:products.create')
        ->name('products.create');

    Route::post('/products', [ProductController::class, 'store'])
        ->middleware('can:products.create')
        ->name('products.store');

    // Update product routes
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
        ->middleware('can:products.update')
        ->name('products.edit');

    Route::put('/products/{product}', [ProductController::class, 'update'])
        ->middleware('can:products.update')
        ->name('products.update');

    // Delete product route
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])
        ->middleware('can:products.delete')
        ->name('products.destroy');
});

Route::middleware(['auth'])->group(function () {

    // View a category
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

    // Update category status (for assigned staff only)
    Route::patch('/categories/{category}/status', [CategoryController::class, 'updateStatus'])->name('categories.updateStatus');
});


require __DIR__.'/auth.php';
