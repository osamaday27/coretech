<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',    // مرتبط بالطلب الرئيسي
        'product_id',  // مرتبط بمنتج الهاردوير
        'quantity',    // الكمية المطلوبة من هذه القطعة
        'price',       // سعر القطعة وقت الشراء
    ];

    /**
     * ينتمي العنصر إلى طلب محدد
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * ينتمي العنصر إلى منتج محدد
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
