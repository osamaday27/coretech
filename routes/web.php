<?php

use App\Http\Controllers\ProfileController;
use App\Models\Product; // استدعاء موديل المنتجات
use App\Models\Category; // استدعاء موديل التصنيفات
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| الواجهة الأمامية للمتجر (Core Tech Front-End)
|--------------------------------------------------------------------------
*/

// 1. الصفحة الرئيسية: تعرض كافة منتجات الهاردوير الحية المسجلة بالسيستم
Route::get('/', function () {
    $products = Product::where('is_active', true)->with('category')->get();
    $categories = Category::where('is_visible', true)->get();
    
    return view('welcome', compact('products', 'categories'));
})->name('shop.home');

// 2. صفحة تفاصيل قطعة هاردوير معينة عند الضغط عليها
Route::get('/product/{slug}', function ($slug) {
    $product = Product::where('slug', $slug)->where('is_active', true)->firstOrFail();
    
    return view('product-details', compact('product'));
})->name('shop.product.show');


/*
|--------------------------------------------------------------------------
| لوحة تحكم المستخدم والـ Profile الافتراضية
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
