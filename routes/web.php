<?php

use App\Http\Controllers\ProfileController;
use App\Models\Product; // استدعاء موديل المنتجات للتأكد من ربط صفحة التفاصيل كودياً
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| الواجهة الأمامية للمتجر (Core Tech Front-End)
|--------------------------------------------------------------------------
*/

// 1. الصفحة الرئيسية: تحميل صفحة welcome المستقرة التي تستدعي الـ Livewire Component
Route::get('/', function () {
    return view('welcome');
})->name('shop.home'); // 👈 هذا السطر يحل مشكلة تحذير Route [shop.home] not found فوراً!

// 2. صفحة تفاصيل قطعة الهاردوير: ضرورية جداً لحل تحذيرات روابط التنقل في صفحة الـ Details
Route::get('/product/{slug}', function ($slug) {
    $product = Product::where('slug', $slug)->where('is_active', true)->firstOrFail();
    return view('product-details', compact('product'));
})->name('shop.product.show');


/*
|--------------------------------------------------------------------------
| لوحة تحكم المستخدم والـ Profile الافتراضية (Laravel Breeze)
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
