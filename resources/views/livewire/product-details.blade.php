<div class="min-h-screen bg-[#F7FBF9]">
    
    <div class="max-w-7xl mx-auto px-4 md:px-8 py-8">
        
        <!-- ===== Breadcrumb ===== -->
        <nav class="flex items-center gap-2 text-sm text-[#3EB489]/60 mb-6 flex-wrap">
            <a href="{{ route('shop.home') }}" class="hover:text-[#3EB489] transition flex items-center gap-1">
                <i class="bi bi-house-fill text-[10px]"></i> الرئيسية
            </a>
            <i class="bi bi-chevron-left text-[8px]"></i>
            <a href="{{ route('shop.home') }}" class="hover:text-[#3EB489] transition">{{ $product->category->name ?? 'المنتجات' }}</a>
            <i class="bi bi-chevron-left text-[8px]"></i>
            <span class="text-[#1A2E26] font-medium truncate">{{ $product->name }}</span>
        </nav>

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

        <!-- ===== تفاصيل المنتج ===== -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 bg-white border border-[#D4EDE3] rounded-3xl p-6 md:p-8 shadow-sm">
            
            <!-- ===== الصور ===== -->
            <div class="space-y-4">
                <div class="relative w-full h-96 bg-[#F0F9F5] rounded-2xl border border-[#D4EDE3] overflow-hidden group">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                             alt="{{ $product->name }}">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-[#3EB489]/20">
                            <i class="bi bi-hdd-stack text-8xl"></i>
                        </div>
                    @endif
                    
                    <!-- حالة المخزون -->
                    <div class="absolute top-4 right-4">
                        @if($product->stock > 0)
                            <span class="px-3 py-1 text-xs font-bold bg-[#E8F5EF] text-[#3EB489] rounded-lg border border-[#D4EDE3] flex items-center gap-1.5">
                                <i class="bi bi-check-circle-fill"></i> متوفر
                            </span>
                        @else
                            <span class="px-3 py-1 text-xs font-bold bg-[#FEF2F2] text-[#EF4444] rounded-lg border border-[#FECACA] flex items-center gap-1.5">
                                <i class="bi bi-x-circle-fill"></i> نفذ
                            </span>
                        @endif
                    </div>
                    
                    <!-- أيقونة زخرفية -->
                    <div class="absolute bottom-4 right-4 text-[#3EB489]/10 text-4xl">
                        <i class="bi bi-cpu"></i>
                    </div>
                </div>
                
                <!-- معرض الصور المصغرة (إذا وجد) -->
                @if($product->gallery && count($product->gallery) > 0)
                    <div class="grid grid-cols-4 gap-3">
                        @foreach($product->gallery as $index => $image)
                            <div class="h-20 bg-[#F0F9F5] rounded-xl border border-[#D4EDE3] overflow-hidden cursor-pointer hover:border-[#3EB489] transition">
                                <img src="{{ asset('storage/' . $image) }}" 
                                     class="w-full h-full object-cover hover:scale-110 transition-transform duration-300"
                                     alt="{{ $product->name }} - {{ $index + 1 }}">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- ===== المعلومات ===== -->
            <div class="flex flex-col justify-between space-y-6">
                <div>
                    <!-- التصنيف والتقييم -->
                    <div class="flex items-center flex-wrap gap-3 mb-4">
                        <span class="text-xs font-bold text-[#3EB489] bg-[#F0F9F5] px-3 py-1 rounded-full border border-[#D4EDE3] flex items-center gap-1.5">
                            <i class="bi bi-tag-fill"></i> {{ $product->category->name ?? 'غير مصنف' }}
                        </span>
                        <span class="text-xs text-[#3EB489]/50 flex items-center gap-1">
                            <i class="bi bi-box-seam"></i> المخزون: {{ $product->stock }} قطعة
                        </span>
                        <span class="text-xs text-[#F59E0B] font-bold flex items-center gap-0.5">
                            <i class="bi bi-star-fill"></i> 4.8
                        </span>
                    </div>
                    
                    <!-- الاسم -->
                    <h2 class="text-2xl md:text-3xl font-bold text-[#1A2E26] leading-tight">
                        {{ $product->name }}
                    </h2>
                    
                    <!-- الكود -->
                    <p class="text-xs text-[#3EB489]/40 mt-1">
                        <i class="bi bi-upc-scan"></i> SKU: {{ $product->sku ?? 'N/A' }}
                    </p>
                    
                    <!-- المواصفات -->
                    <div class="mt-6 bg-[#F7FBF9] border border-[#D4EDE3] rounded-2xl p-5">
                        <h4 class="text-sm font-bold text-[#1A2E26] flex items-center gap-2 mb-3">
                            <i class="bi bi-info-circle text-[#3EB489]"></i> المواصفات الفنية
                        </h4>
                        <div class="text-sm text-[#1A2E26]/70 leading-relaxed whitespace-pre-line">
                            {!! $product->description ?? 'لا توجد تفاصيل إضافية مسجلة لهذه القطعة حالياً.' !!}
                        </div>
                    </div>
                    
                    <!-- المميزات (إذا وجدت) -->
                    @if($product->features)
                        <div class="mt-4 grid grid-cols-2 gap-2">
                            @foreach($product->features as $feature)
                                <div class="flex items-center gap-2 text-xs text-[#1A2E26]/70 bg-[#F0F9F5] px-3 py-2 rounded-xl border border-[#D4EDE3]">
                                    <i class="bi bi-check-circle-fill text-[#3EB489] text-[10px]"></i>
                                    {{ $feature }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- ===== كارت السعر والشراء ===== -->
                <div class="bg-[#F7FBF9] border border-[#D4EDE3] rounded-2xl p-6">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="text-center sm:text-right">
                            <span class="text-[10px] text-[#3EB489]/50 font-semibold uppercase tracking-wider">السعر شامل الضريبة</span>
                            <div class="text-3xl md:text-4xl font-black text-[#1A2E26]">
                                {{ number_format($product->price) }}
                                <span class="text-sm font-normal text-[#3EB489]/50">ج.م</span>
                            </div>
                            @if($product->old_price)
                                <span class="text-sm text-[#EF4444]/50 line-through block">
                                    {{ number_format($product->old_price) }} ج.م
                                </span>
                            @endif
                        </div>

                        <div class="flex flex-wrap gap-3">
                            @if($product->stock > 0)
                                <button wire:click="addToCart({{ $product->id }})" 
                                    class="px-8 py-3.5 bg-[#3EB489] text-white font-bold rounded-xl text-sm hover:bg-[#2D8A6A] transition shadow-md hover:shadow-lg flex items-center gap-2">
                                    <i class="bi bi-cart-plus"></i> أضف للسلة
                                </button>
                                <a href="{{ route('shop.home') }}" 
                                   class="px-6 py-3.5 border-2 border-[#3EB489] text-[#3EB489] font-bold rounded-xl text-sm hover:bg-[#3EB489] hover:text-white transition flex items-center gap-2">
                                    <i class="bi bi-arrow-left"></i> متابعة التسوق
                                </a>
                            @else
                                <span class="text-sm text-[#EF4444] font-bold bg-[#FEF2F2] border border-[#FECACA] px-6 py-3 rounded-xl flex items-center gap-2">
                                    <i class="bi bi-x-circle"></i> غير متوفر حالياً
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <!-- شروط الشراء -->
                    <div class="flex flex-wrap items-center justify-center sm:justify-start gap-4 mt-4 pt-4 border-t border-[#D4EDE3] text-[10px] text-[#3EB489]/40">
                        <span class="flex items-center gap-1">
                            <i class="bi bi-truck"></i> شحن سريع
                        </span>
                        <span class="flex items-center gap-1">
                            <i class="bi bi-arrow-repeat"></i> إرجاع مجاني
                        </span>
                        <span class="flex items-center gap-1">
                            <i class="bi bi-shield-check"></i> ضمان الجودة
                        </span>
                        <span class="flex items-center gap-1">
                            <i class="bi bi-credit-card"></i> دفع آمن
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== منتجات مشابهة ===== -->
        @if($similarProducts && $similarProducts->count() > 0)
            <div class="mt-12">
                <h3 class="text-xl font-bold text-[#1A2E26] mb-6 flex items-center gap-2">
                    <i class="bi bi-lightning-charge-fill text-[#3EB489]"></i> قد يعجبك أيضاً
                    <span class="text-sm text-[#3EB489]/50 font-normal">(منتجات مشابهة)</span>
                </h3>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($similarProducts as $similar)
                        <div class="group bg-white border border-[#D4EDE3] rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
                            <div class="relative h-40 bg-[#F0F9F5] overflow-hidden">
                                @if($similar->image)
                                    <a href="{{ route('shop.product.show', $similar->slug) }}">
                                        <img src="{{ asset('storage/' . $similar->image) }}" 
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                             alt="{{ $similar->name }}">
                                    </a>
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-[#3EB489]/20">
                                        <i class="bi bi-hdd-stack text-5xl"></i>
                                    </div>
                                @endif
                                @if($similar->stock > 0)
                                    <span class="absolute top-2 right-2 px-2 py-0.5 text-[8px] font-bold bg-[#E8F5EF] text-[#3EB489] rounded-lg border border-[#D4EDE3]">
                                        متوفر
                                    </span>
                                @else
                                    <span class="absolute top-2 right-2 px-2 py-0.5 text-[8px] font-bold bg-[#FEF2F2] text-[#EF4444] rounded-lg border border-[#FECACA]">
                                        نفذ
                                    </span>
                                @endif
                            </div>
                            <div class="p-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-[8px] font-bold text-[#3EB489] bg-[#F0F9F5] px-2 py-0.5 rounded-full border border-[#D4EDE3]">
                                        {{ $similar->category->name ?? '' }}
                                    </span>
                                    <span class="text-[10px] text-[#F59E0B] font-bold flex items-center gap-0.5">
                                        <i class="bi bi-star-fill text-[8px]"></i> 4.8
                                    </span>
                                </div>
                                <h4 class="text-sm font-bold text-[#1A2E26] truncate mt-1">
                                    <a href="{{ route('shop.product.show', $similar->slug) }}" class="hover:text-[#3EB489] transition">
                                        {{ $similar->name }}
                                    </a>
                                </h4>
                                <p class="text-sm font-bold text-[#1A2E26] mt-1">
                                    {{ number_format($similar->price) }} 
                                    <span class="text-[10px] font-normal text-[#3EB489]/50">ج.م</span>
                                </p>
                                @if($similar->stock > 0)
                                    <button wire:click="addToCart({{ $similar->id }})" 
                                        class="mt-2 w-full py-1.5 bg-[#3EB489] text-white font-bold rounded-lg text-[10px] hover:bg-[#2D8A6A] transition flex items-center justify-center gap-1">
                                        <i class="bi bi-cart-plus"></i> إضافة
                                    </button>
                                @else
                                    <span class="mt-2 w-full py-1.5 text-[10px] text-[#EF4444] font-bold bg-[#FEF2F2] rounded-lg border border-[#FECACA] flex items-center justify-center gap-1">
                                        <i class="bi bi-x-circle"></i> نفد
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- ===== العودة للأعلى ===== -->
        <div class="text-center mt-8">
            <a href="#" onclick="window.scrollTo({top:0,behavior:'smooth'})" 
               class="inline-flex items-center gap-2 text-sm text-[#3EB489]/50 hover:text-[#3EB489] transition">
                <i class="bi bi-arrow-up-circle-fill"></i> العودة للأعلى
            </a>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- 🎨 التنسيقات داخل الـ div -->
    <!-- ============================================================== -->
    <style>
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(62, 180, 137, 0.12);
        }
    </style>
</div>