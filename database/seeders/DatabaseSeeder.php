<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. إنشاء مستخدم مدير لتسجيل الدخول وتجربة الفواتير
        User::factory()->create([
            'name' => 'Engineer Ahmed',
            'email' => 'admin@coretech.com',
            'password' => bcrypt('12345678'),
        ]);

        // 2. إنشاء تصنيف كروت الشاشة
        $gpuCategory = Category::create([
            'name' => 'كروت شاشة / GPUs',
            'slug' => 'gpus',
            'is_visible' => true,
        ]);

        // 3. إنشاء تصنيف المعالجات
        $cpuCategory = Category::create([
            'name' => 'معالجات / CPUs',
            'slug' => 'cpus',
            'is_visible' => true,
        ]);

        // 4. حقن منتجات هاردوير داخل تصنيف كروت الشاشة
        Product::create([
            'name' => 'NVIDIA RTX 4070 Ti Super',
            'slug' => Str::slug('NVIDIA RTX 4070 Ti Super'),
            'description' => 'كارت شاشة احترافي من إنفيديا بذاكرة 16 جيجابايت جي دي دي آر 6 اكس، مثالي للألعاب والمونتاج الثقيل.',
            'price' => 45000.00,
            'stock' => 12,
            'is_active' => true,
            'category_id' => $gpuCategory->id,
        ]);

        Product::create([
            'name' => 'AMD Radeon RX 7800 XT',
            'slug' => Str::slug('AMD Radeon RX 7800 XT'),
            'description' => 'كارت شاشة جبار للألعاب بدقة 2K مع ذاكرة 16 جيجابايت كفاءة تبريد عالية.',
            'price' => 32000.00,
            'stock' => 8,
            'is_active' => true,
            'category_id' => $gpuCategory->id,
        ]);

        // 5. حقن منتجات هاردوير داخل تصنيف المعالجات
        Product::create([
            'name' => 'Intel Core i7-14700K',
            'slug' => Str::slug('Intel Core i7-14700K'),
            'description' => 'معالج إنتل من الجيل الرابع عشر بـ 20 نواة وسرعة تصل إلى 5.6 جيجاهرتز كسر سرعة مفتوح.',
            'price' => 22500.00,
            'stock' => 15,
            'is_active' => true,
            'category_id' => $cpuCategory->id,
        ]);

        Product::create([
            'name' => 'AMD Ryzen 7 7800X3D',
            'slug' => Str::slug('AMD Ryzen 7 7800X3D'),
            'description' => 'المعالج الأقوى في العالم للألعاب بتقنية 3D V-Cache المبتكرة واستهلاك طاقة ممتاز.',
            'price' => 24000.00,
            'stock' => 5,
            'is_active' => true,
            'category_id' => $cpuCategory->id,
        ]);
    }
}
