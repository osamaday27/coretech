<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            
            // ربط العنصر بالطلب الرئيسي (إذا حُذف الطلب نهائياً تُحذف عناصره)
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            
            // ربط العنصر بمنتج الهاردوير
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            
            $table->integer('quantity')->default(1); // الكمية المطلوبة من القطعة
            $table->decimal('price', 10, 2); // سعر القطعة وقت الشراء (للحماية من تغير الأسعار لاحقاً)
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
