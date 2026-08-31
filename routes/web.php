<?php

use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Livewire\ShopComponent;

/*
|--------------------------------------------------------------------------
| الواجهة الأمامية للمتجر
|--------------------------------------------------------------------------
*/

// ✅ الطريقة الصحيحة - استخدام Livewire مباشرة مع Layout
Route::get('/', ShopComponent::class)->name('shop.home');

// صفحة تفاصيل القطعة
Route::get('/product/{slug}', function ($slug) {
    $product = Product::where('slug', $slug)->where('is_active', true)->firstOrFail();
    return view('product-details', compact('product'));
})->name('shop.product.show');

/*
|--------------------------------------------------------------------------
| لوحة تحكم المستخدم
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';