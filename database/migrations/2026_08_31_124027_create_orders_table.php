<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            // ربط الطلب بالمستخدم/العميل (جدول Users الأساسي في لارافيل)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            $table->string('order_number')->unique(); // رقم الفاتورة (مثال: CT-2026-1001)
            $table->decimal('total_price', 10, 2); // إجمالي الحساب
            
            // حالة الطلب وحالة الدفع عبر الـ string مع وضع قيمة افتراضية
            $table->string('status')->default('pending'); 
            $table->string('payment_method')->default('cash');
            $table->string('payment_status')->default('pending');
            
            $table->text('shipping_address'); // عنوان العميل لشحن الهاردوير
            $table->text('notes')->nullable(); // ملاحظات إضافية
            
            $table->softDeletes(); // تفعيل الحذف الناعم (Soft Delete) للطلبات
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
