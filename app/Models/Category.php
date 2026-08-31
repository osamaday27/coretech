<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes; // استدعاء الهيدر هنا

class Category extends Model
{
    use HasFactory, SoftDeletes; // تفعيل السوفت دليت

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'is_visible',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
