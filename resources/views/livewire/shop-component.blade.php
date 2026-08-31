<div class="min-h-screen bg-[#F7FBF9] font-['Tajawal','Space_Grotesk',sans-serif]">
    
    <!-- ============================================================== -->
    <!-- 🚀 الهيدر العلوي -->
    <!-- ============================================================== -->
    <header class="bg-white border-b border-[#D4EDE3] shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="flex items-center justify-between h-16 md:h-20">
                <!-- الشعار -->
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#3EB489] to-[#2D8A6A] flex items-center justify-center shadow-md">
                        <i class="bi bi-cpu text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl md:text-2xl font-black tracking-tight text-[#1A2E26]">
                            Core <span class="text-[#3EB489]">Tech</span>
                        </h1>
                        <p class="text-[9px] tracking-[0.2em] text-[#3EB489]/60 uppercase font-semibold">
                            <i class="bi bi-grid-3x3-gap-fill text-[10px]"></i> Hardware Store
                        </p>
                    </div>
                </div>
                
                <!-- الروابط -->
                <div class="flex items-center gap-4">
                    <!-- السلة -->
                    <div class="relative">
                        <button class="w-10 h-10 rounded-full border border-[#D4EDE3] bg-white flex items-center justify-center text-[#3EB489] hover:border-[#3EB489] hover:shadow-md transition">
                            <i class="bi bi-cart3 text-lg"></i>
                            <span class="absolute -top-1 -right-1 w-5 h-5 bg-[#3EB489] text-white text-[10px] font-bold rounded-full flex items-center justify-center shadow-sm">
                                {{ count($cart) }}
                            </span>
                        </button>
                    </div>
                    
                    @auth
                        <a href="/admin" class="text-sm bg-[#3EB489] text-white px-4 py-2 rounded-xl font-bold hover:bg-[#2D8A6A] transition flex items-center gap-2">
                            <i class="bi bi-speedometer2"></i> لوحة التحكم
                        </a>
                    @else
                        <a href="/login" class="text-sm bg-[#3EB489] text-white px-4 py-2 rounded-xl font-bold hover:bg-[#2D8A6A] transition flex items-center gap-2">
                            <i class="bi bi-box-arrow-in-right"></i> تسجيل الدخول
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- ============================================================== -->
    <!-- 🎯 المحتوى الرئيسي -->
    <!-- ============================================================== -->
    <main class="max-w-7xl mx-auto px-4 md:px-8 py-8">
        
        <!-- ===== هيرو سيكشن ===== -->
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#3EB489] to-[#2D8A6A] p-8 md:p-12 mb-10 shadow-xl">
            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur text-white text-xs font-bold px-4 py-1.5 rounded-full mb-4">
                    <i class="bi bi-lightning-charge-fill"></i>
                    عروض حصرية
                </div>
                <h2 class="text-3xl md:text-5xl font-black text-white leading-tight">
                    ابني تجميعتك
                    <br>
                    <span class="text-[#E8F5EF]">الآن بأفضل الأسعار</span>
                </h2>
                <p class="text-white/80 mt-3 max-w-lg text-sm">
                    اختر من بين <span class="font-bold">300+</span> قطعة هاردوير من أفضل الماركات العالمية.
                </p>
                <div class="flex flex-wrap gap-3 mt-6">
                    <a href="#products" class="px-6 py-3 bg-white text-[#1A2E26] font-bold rounded-xl text-sm hover:bg-[#E8F5EF] transition shadow-lg hover:shadow-xl flex items-center gap-2">
                        <i class="bi bi-search"></i> استعرض القطع
                    </a>
                    <a href="#" class="px-6 py-3 bg-white/20 backdrop-blur text-white font-bold rounded-xl text-sm hover:bg-white/30 transition flex items-center gap-2">
                        <i class="bi bi-fire"></i> عروض اليوم
                    </a>
                </div>
            </div>
            <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-[#E8F5EF]/10 rounded-full blur-3xl"></div>
            <div class="absolute top-1/4 right-12 text-white/10 text-6xl">
                <i class="bi bi-cpu"></i>
            </div>
            <div class="absolute bottom-1/4 left-12 text-white/10 text-5xl">
                <i class="bi bi-motherboard-fill"></i>
            </div>
        </div>

        <!-- ===== إحصائيات سريعة ===== -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
            <div class="bg-white border border-[#D4EDE3] rounded-2xl p-5 text-center shadow-sm hover:shadow-md transition">
                <div class="text-3xl font-black text-[#3EB489]">300+</div>
                <p class="text-xs text-[#3EB489]/60 font-medium mt-1 flex items-center justify-center gap-1">
                    <i class="bi bi-grid-3x3-gap-fill"></i> قطعة هاردوير
                </p>
            </div>
            <div class="bg-white border border-[#D4EDE3] rounded-2xl p-5 text-center shadow-sm hover:shadow-md transition">
                <div class="text-3xl font-black text-[#3EB489]">50+</div>
                <p class="text-xs text-[#3EB489]/60 font-medium mt-1 flex items-center justify-center gap-1">
                    <i class="bi bi-tags"></i> ماركة عالمية
                </p>
            </div>
            <div class="bg-white border border-[#D4EDE3] rounded-2xl p-5 text-center shadow-sm hover:shadow-md transition">
                <div class="text-3xl font-black text-[#F59E0B]">4.9</div>
                <p class="text-xs text-[#3EB489]/60 font-medium mt-1 flex items-center justify-center gap-1">
                    <i class="bi bi-star-fill text-[#F59E0B]"></i> تقييم العملاء
                </p>
            </div>
            <div class="bg-white border border-[#D4EDE3] rounded-2xl p-5 text-center shadow-sm hover:shadow-md transition">
                <div class="text-3xl font-black text-[#3EB489]">10K+</div>
                <p class="text-xs text-[#3EB489]/60 font-medium mt-1 flex items-center justify-center gap-1">
                    <i class="bi bi-people-fill"></i> عميل سعيد
                </p>
            </div>
        </div>

        <!-- ===== فلترة التصنيفات ===== -->
        <div class="mb-8">
            <div class="flex items-center gap-2 overflow-x-auto pb-3">
                <button wire:click="filterCategory(null)" 
                    class="group px-5 py-2.5 rounded-xl text-sm font-bold transition-all duration-300 shrink-0 whitespace-nowrap flex items-center gap-2
                    {{ is_null($selectedCategory) 
                        ? 'bg-[#3EB489] text-white shadow-md shadow-[#3EB489]/20' 
                        : 'bg-white border border-[#D4EDE3] text-[#1A2E26] hover:border-[#3EB489] hover:text-[#3EB489]' 
                    }}">
                    <i class="bi bi-grid-fill"></i> جميع القطع
                </button>
                @foreach($categories as $category)
                    <button wire:click="filterCategory({{ $category->id }})" 
                        class="px-5 py-2.5 rounded-xl text-sm font-bold transition-all duration-300 shrink-0 whitespace-nowrap flex items-center gap-2
                        {{ $selectedCategory == $category->id 
                            ? 'bg-[#3EB489] text-white shadow-md shadow-[#3EB489]/20' 
                            : 'bg-white border border-[#D4EDE3] text-[#1A2E26] hover:border-[#3EB489] hover:text-[#3EB489]' 
                        }}">
                        <i class="bi bi-tag-fill"></i> {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- ===== الإشعارات ===== -->
        @if (session()->has('success'))
            <div class="mb-6 p-4 bg-[#E8F5EF] border border-[#3EB489] rounded-2xl text-[#1A2E26] flex items-center gap-3">
                <i class="bi bi-check-circle-fill text-[#3EB489] text-xl"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif
        
        @if (session()->has('error'))
            <div class="mb-6 p-4 bg-[#FEF2F2] border border-[#EF4444] rounded-2xl text-[#1A2E26] flex items-center gap-3">
                <i class="bi bi-exclamation-circle-fill text-[#EF4444] text-xl"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <!-- ===== المنتجات ===== -->
        <div id="products" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($products as $product)
                <div class="group bg-white border border-[#D4EDE3] rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    
                    <!-- صورة المنتج -->
                    <div class="relative h-48 bg-[#F0F9F5] overflow-hidden">
                        @if($product->image)
                            <a href="{{ route('shop.product.show', $product->slug) }}">
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                     alt="{{ $product->name }}">
                            </a>
                        @else
                            <div class="w-full h-full flex items-center justify-center text-[#3EB489]/20">
                                <i class="bi bi-hdd-stack text-7xl"></i>
                            </div>
                        @endif
                        
                        <!-- حالة المخزون -->
                        <div class="absolute top-3 right-3">
                            @if($product->stock > 0)
                                <span class="px-3 py-1 text-[10px] font-bold bg-[#E8F5EF] text-[#3EB489] rounded-lg border border-[#D4EDE3] flex items-center gap-1">
                                    <i class="bi bi-check-circle-fill text-[8px]"></i> متوفر
                                </span>
                            @else
                                <span class="px-3 py-1 text-[10px] font-bold bg-[#FEF2F2] text-[#EF4444] rounded-lg border border-[#FECACA] flex items-center gap-1">
                                    <i class="bi bi-x-circle-fill text-[8px]"></i> نفذ
                                </span>
                            @endif
                        </div>
                        
                        <!-- زر التفاصيل -->
                        <a href="{{ route('shop.product.show', $product->slug) }}" 
                           class="absolute inset-0 bg-[#1A2E26]/40 backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <span class="px-6 py-2.5 bg-white text-[#1A2E26] font-bold rounded-xl text-sm shadow-lg hover:bg-[#F0F9F5] transition flex items-center gap-2">
                                <i class="bi bi-eye"></i> عرض التفاصيل
                            </span>
                        </a>
                    </div>
                    
                    <!-- معلومات المنتج -->
                    <div class="p-5">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[9px] font-bold text-[#3EB489] bg-[#F0F9F5] px-3 py-0.5 rounded-full border border-[#D4EDE3] flex items-center gap-1">
                                <i class="bi bi-tag-fill text-[8px]"></i> {{ $product->category->name }}
                            </span>
                            <span class="text-xs text-[#F59E0B] font-bold flex items-center gap-0.5">
                                <i class="bi bi-star-fill text-[10px]"></i> 4.8
                            </span>
                        </div>
                        
                        <a href="{{ route('shop.product.show', $product->slug) }}">
                            <h3 class="text-sm font-bold text-[#1A2E26] group-hover:text-[#3EB489] transition line-clamp-1">
                                {{ $product->name }}
                            </h3>
                        </a>
                        
                        <p class="text-xs text-[#3EB489]/50 mt-1.5 line-clamp-2 leading-relaxed">
                            {{ $product->description }}
                        </p>
                        
                        <div class="mt-4 flex items-center justify-between pt-3 border-t border-[#D4EDE3]">
                            <div>
                                <span class="text-[10px] text-[#3EB489]/40 font-semibold tracking-wide">السعر</span>
                                <div class="text-lg font-black text-[#1A2E26]">
                                    {{ number_format($product->price) }}
                                    <span class="text-[10px] font-normal text-[#3EB489]/40">ج.م</span>
                                </div>
                            </div>
                            
                            @if($product->stock > 0)
                                <button wire:click="addToCart({{ $product->id }})" 
                                    class="px-4 py-2.5 bg-[#3EB489] text-white font-bold rounded-xl text-[10px] hover:bg-[#2D8A6A] transition shadow-sm hover:shadow-md flex items-center gap-1.5">
                                    <i class="bi bi-cart-plus"></i> إضافة
                                </button>
                            @else
                                <span class="text-[10px] text-[#EF4444] font-bold bg-[#FEF2F2] px-3 py-1.5 rounded-lg border border-[#FECACA] flex items-center gap-1">
                                    <i class="bi bi-x-circle"></i> نفد
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center py-20 text-center">
                    <div class="w-32 h-32 rounded-full bg-[#F0F9F5] flex items-center justify-center mb-6">
                        <i class="bi bi-hdd-stack text-6xl text-[#3EB489]/30"></i>
                    </div>
                    <p class="text-[#1A2E26] text-base font-bold">لا توجد قطع متاحة</p>
                    <p class="text-[#3EB489]/50 text-sm mt-1">جرب تغيير التصنيف المحدد</p>
                </div>
            @endforelse
        </div>
        
        <!-- ===== عرض حصري ===== -->
        <div class="relative mt-12 overflow-hidden rounded-3xl bg-gradient-to-r from-[#3EB489] to-[#2D8A6A] p-8 md:p-10 shadow-xl">
            <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-[#E8F5EF]/5 rounded-full blur-3xl"></div>
            <div class="relative z-10 text-center">
                <span class="inline-block text-xs font-bold text-white bg-white/20 backdrop-blur px-4 py-1.5 rounded-full mb-4">
                    <i class="bi bi-gift-fill"></i> عرض محدود
                </span>
                <h3 class="text-2xl md:text-4xl font-black text-white">
                    خصم <span class="text-[#E8F5EF]">20%</span> على أول طلب
                </h3>
                <p class="text-white/80 mt-2 text-sm max-w-md mx-auto">
                    اشترك الآن واحصل على خصم 20% على أول عملية شراء. العرض ساري لفترة محدودة!
                </p>
                <a href="#" class="inline-block mt-6 px-8 py-3.5 bg-white text-[#1A2E26] font-bold rounded-xl shadow-lg hover:shadow-xl transition hover:bg-[#E8F5EF] flex items-center gap-2 mx-auto">
                    <i class="bi bi-envelope-paper-fill"></i> اشترك الآن
                </a>
            </div>
        </div>
    </main>

    <!-- ============================================================== -->
    <!-- 📱 Footer -->
    <!-- ============================================================== -->
    <footer class="bg-white border-t border-[#D4EDE3] mt-12">
        <div class="max-w-7xl mx-auto px-4 md:px-8 py-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h4 class="text-sm font-bold text-[#1A2E26] mb-4 flex items-center gap-2">
                        <i class="bi bi-cpu text-[#3EB489]"></i> Core Tech
                    </h4>
                    <ul class="space-y-2 text-sm text-[#3EB489]/60">
                        <li><a href="#" class="hover:text-[#3EB489] transition flex items-center gap-2"><i class="bi bi-chevron-left text-[10px]"></i> من نحن</a></li>
                        <li><a href="#" class="hover:text-[#3EB489] transition flex items-center gap-2"><i class="bi bi-chevron-left text-[10px]"></i> اتصل بنا</a></li>
                        <li><a href="#" class="hover:text-[#3EB489] transition flex items-center gap-2"><i class="bi bi-chevron-left text-[10px]"></i> الشروط والأحكام</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-[#1A2E26] mb-4 flex items-center gap-2">
                        <i class="bi bi-shop text-[#3EB489]"></i> تسوق
                    </h4>
                    <ul class="space-y-2 text-sm text-[#3EB489]/60">
                        <li><a href="#" class="hover:text-[#3EB489] transition flex items-center gap-2"><i class="bi bi-chevron-left text-[10px]"></i> معالجات</a></li>
                        <li><a href="#" class="hover:text-[#3EB489] transition flex items-center gap-2"><i class="bi bi-chevron-left text-[10px]"></i> كروت الشاشة</a></li>
                        <li><a href="#" class="hover:text-[#3EB489] transition flex items-center gap-2"><i class="bi bi-chevron-left text-[10px]"></i> مذربورد</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-[#1A2E26] mb-4 flex items-center gap-2">
                        <i class="bi bi-headset text-[#3EB489]"></i> الدعم
                    </h4>
                    <ul class="space-y-2 text-sm text-[#3EB489]/60">
                        <li><a href="#" class="hover:text-[#3EB489] transition flex items-center gap-2"><i class="bi bi-chevron-left text-[10px]"></i> الأسئلة الشائعة</a></li>
                        <li><a href="#" class="hover:text-[#3EB489] transition flex items-center gap-2"><i class="bi bi-chevron-left text-[10px]"></i> سياسة الإرجاع</a></li>
                        <li><a href="#" class="hover:text-[#3EB489] transition flex items-center gap-2"><i class="bi bi-chevron-left text-[10px]"></i> الشحن والتوصيل</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-[#1A2E26] mb-4 flex items-center gap-2">
                        <i class="bi bi-share-fill text-[#3EB489]"></i> تابعنا
                    </h4>
                    <div class="flex gap-3 text-[#3EB489]/50">
                        <a href="#" class="w-10 h-10 rounded-full border border-[#D4EDE3] flex items-center justify-center hover:border-[#3EB489] hover:text-[#3EB489] hover:bg-[#F0F9F5] transition">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full border border-[#D4EDE3] flex items-center justify-center hover:border-[#3EB489] hover:text-[#3EB489] hover:bg-[#F0F9F5] transition">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full border border-[#D4EDE3] flex items-center justify-center hover:border-[#3EB489] hover:text-[#3EB489] hover:bg-[#F0F9F5] transition">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full border border-[#D4EDE3] flex items-center justify-center hover:border-[#3EB489] hover:text-[#3EB489] hover:bg-[#F0F9F5] transition">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="text-center text-xs text-[#3EB489]/30 border-t border-[#D4EDE3] pt-6 mt-6">
                <i class="bi bi-cpu"></i> Core Tech &copy; {{ date('Y') }} — جميع الحقوق محفوظة <i class="bi bi-motherboard-fill"></i>
            </div>
        </div>
    </footer>

    <!-- ============================================================== -->
    <!-- 🎨 التنسيقات داخل الـ div -->
    <!-- ============================================================== -->
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            height: 3px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #E8F3EE;
            border-radius: 9999px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #3EB489;
            border-radius: 9999px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #2D8A6A;
        }
        
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(62, 180, 137, 0.12);
        }
    </style>
</div>