<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Frontend\HomeComponent;
use App\Http\Livewire\Frontend\ProductDetailsComponent;
use App\Http\Livewire\Frontend\CartComponent;
use App\Http\Livewire\Frontend\CheckoutComponent;
use App\Http\Livewire\Frontend\SingleCategoryComponent;
use App\Http\Livewire\Frontend\ShopComponent;


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name("dashboard");

Route::get('/form', function () {
    return view('admin.form');
})->name("form");

// Frontend Routes
Route::get('/', HomeComponent::class)->name("home");
Route::get('/details/{slug}',ProductDetailsComponent::class)->name("details");
Route::get('/category/{category_name?}/{subcategory_name?}',SingleCategoryComponent::class)->name("category");
Route::get('/cart',CartComponent::class)->name("cart");
Route::get('/checkout',CheckoutComponent::class)->name("checkout");

// Redirect to homepage if the page target does not exist
Route::any('{query}',function() { return redirect('/'); })->where('query', '.*');

require __DIR__.'/auth.php';
