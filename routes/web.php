<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Admin Livewires
use App\Http\Livewire\Admin\Product\ProductComponent;
use App\Http\Livewire\Admin\Product\AddProductComponent;
use App\Http\Livewire\Admin\Product\EditProductComponent;
use App\Http\Livewire\Admin\Product\ShowProductComponent;
use App\Http\Livewire\Admin\Category\CategoryComponent;
use App\Http\Livewire\Admin\Category\AddCategoryComponent;
use App\Http\Livewire\Admin\Category\EditCategoryComponent;
use App\Http\Livewire\Admin\SubCategory\SubCategoryComponent;
use App\Http\Livewire\Admin\SubCategory\AddSubCategoryComponent;
use App\Http\Livewire\Admin\SubCategory\EditSubCategoryComponent;


// Front-End Livewires
use App\Http\Livewire\Frontend\HomeComponent;
use App\Http\Livewire\Frontend\ProductDetailsComponent;
use App\Http\Livewire\Frontend\CartComponent;
use App\Http\Livewire\Frontend\CheckoutComponent;
use App\Http\Livewire\Frontend\SingleCategoryComponent;
use App\Http\Livewire\Frontend\ShopComponent;


// Admin Routes

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name("dashboard");
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get("products",ProductComponent::class)->name("products");
    Route::get("products/add",AddProductComponent::class)->name("products.add");
    Route::get("products/edit/{product_id}",EditProductComponent::class)->name("products.edit");
    Route::get("products/show/{product_id}",ShowProductComponent::class)->name("products.show");

    Route::get("categories",CategoryComponent::class)->name("categories");
    Route::get("categories/{category_id}",[CategoryComponent::class,"Destroy"])->name("category.delete");
    Route::get("category/add",AddCategoryComponent::class)->name("category.add");
    Route::get("category/edit/{category_id}",EditCategoryComponent::class)->name("category.edit");
    
    Route::get("subcategories",SubCategoryComponent::class)->name("subcategories");
    Route::get("subcategories/{subcategory_id}",[SubCategoryComponent::class,"Destroy"])->name("subcategory.delete");
    Route::get("subcategory/add",AddSubCategoryComponent::class)->name("subcategory.add");
    Route::get("subcategory/edit/{subcategory_id}",EditSubCategoryComponent::class)->name("subcategory.edit");

});


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
// Route::any('{query}',function() { return redirect('/'); })->where('query', '.*');

require __DIR__.'/auth.php';
