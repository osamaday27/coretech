<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| الواجهة الأمامية للمتجر (Core Tech Front-End)
|--------------------------------------------------------------------------
*/

// الصفحة الرئيسية: تحميل صفحة welcome الافتراضية والمستقرة
Route::get('/', function () {
    return view('welcome');
})->name('shop.home');


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
