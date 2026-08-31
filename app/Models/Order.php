<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',          // العميل (مرتبط بجدول المستخدمين الأساسي لارافيل)
        'order_number',     // رقم الطلب الفريد (مثل: CT-2026-1001)
        'total_price',      // إجمالي الفاتورة
        'status',           // حالة الطلب (pending, processing, shipped, completed, cancelled)
        'payment_method',   // طريقة الدفع (cash, stripe, paymob)
        'payment_status',   // حالة الدفع (pending, paid, failed)
        'shipping_address', // عنوان الشحن بالتفصيل
        'notes',            // ملاحظات العميل
    ];

    /**
     * علاقة الطلب بالعميل: الطلب ينتمي إلى مستخدم واحد
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * علاقة الطلب بتفاصيل المنتجات: الطلب يحتوي على عدة عناصر/منتجات
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
