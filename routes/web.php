<?php

use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Livewire\ShopComponent;
use App\Livewire\ProductDetails;

// الصفحة الرئيسية
Route::get('/', ShopComponent::class)->name('shop.home');

// صفحة تفاصيل المنتج
Route::get('/product/{slug}', ProductDetails::class)->name('shop.product.show');

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