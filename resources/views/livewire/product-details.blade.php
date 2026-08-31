<div class="min-h-screen bg-[#F7F8F6] font-['Tajawal',sans-serif]" dir="rtl">

    <div class="max-w-7xl mx-auto px-4 md:px-8 py-8">

        <!-- ===== Breadcrumb ===== -->
        <nav class="flex items-center gap-2 text-sm text-[#7C8C85] mb-6 flex-wrap">
            <a href="{{ route('shop.home') }}" class="hover:text-[#1E8A63] transition flex items-center gap-1">
                <i class="bi bi-house-fill text-[10px]"></i> الرئيسية
            </a>
            <i class="bi bi-chevron-left text-[8px]"></i>
            <a href="{{ route('shop.home') }}" class="hover:text-[#1E8A63] transition">{{ $product->category->name ?? 'المنتجات' }}</a>
            <i class="bi bi-chevron-left text-[8px]"></i>
            <span class="text-[#0F2A1E] font-medium truncate">{{ $product->name }}</span>
        </nav>

        <!-- ===== الإشعارات ===== -->
        @if (session()->has('success'))
            <div class="mb-6 p-4 bg-[#EAF5EF] border border-[#CFE9DC] rounded-2xl text-[#1E8A63] flex items-center gap-3">
                <i class="bi bi-check-circle-fill text-xl"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="mb-6 p-4 bg-[#FBEAE8] border border-[#F1C7C1] rounded-2xl text-[#C0392B] flex items-center gap-3">
                <i class="bi bi-exclamation-circle-fill text-xl"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <!-- ===== تفاصيل المنتج ===== -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 bg-white border border-[#E4EAE7] rounded-[28px] p-6 md:p-10">

            <!-- ===== الصور ===== -->
            <div class="space-y-3">
                <div class="relative w-full h-96 bg-[#F2F5F3] rounded-2xl overflow-hidden group">
                    @if($product->image)
                        <img id="mainProductImage"
                             src="{{ asset('storage/' . $product->image) }}"
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                             alt="{{ $product->name }}">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-[#C7D3CD]">
                            <i class="bi bi-hdd-stack text-8xl"></i>
                        </div>
                    @endif

                    <!-- حالة المخزون -->
                    <div class="absolute top-4 right-4">
                        @if($product->stock > 0)
                            <span class="px-3 py-1 text-xs font-bold bg-white/95 text-[#1E8A63] rounded-lg flex items-center gap-1.5">
                                <i class="bi bi-check-circle-fill"></i> متوفر
                            </span>
                        @else
                            <span class="px-3 py-1 text-xs font-bold bg-white/95 text-[#C0392B] rounded-lg flex items-center gap-1.5">
                                <i class="bi bi-x-circle-fill"></i> نفذ
                            </span>
                        @endif
                    </div>
                </div>

                <!-- معرض الصور المصغرة -->
                @if($product->gallery && count($product->gallery) > 0)
                    <div class="grid grid-cols-5 gap-2.5">
                        <button type="button"
                                onclick="document.getElementById('mainProductImage').src='{{ asset('storage/' . $product->image) }}'"
                                class="h-16 bg-[#F2F5F3] rounded-xl overflow-hidden ring-2 ring-[#3EB489] transition">
                            <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover" alt="{{ $product->name }}">
                        </button>
                        @foreach($product->gallery as $index => $image)
                            <button type="button"
                                    onclick="document.getElementById('mainProductImage').src='{{ asset('storage/' . $image) }}'"
                                    class="h-16 bg-[#F2F5F3] rounded-xl overflow-hidden ring-2 ring-transparent hover:ring-[#3EB489]/50 transition">
                                <img src="{{ asset('storage/' . $image) }}" class="w-full h-full object-cover" alt="{{ $product->name }} - {{ $index + 1 }}">
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- ===== المعلومات ===== -->
            <div class="flex flex-col justify-between space-y-6">
                <div>
                    <!-- التصنيف والتقييم -->
                    <div class="flex items-center flex-wrap gap-2 mb-4">
                        <span class="text-xs font-bold text-[#1E8A63] bg-[#EAF5EF] px-3 py-1 rounded-full flex items-center gap-1.5">
                            <i class="bi bi-tag-fill"></i> {{ $product->category->name ?? 'غير مصنف' }}
                        </span>
                        <span class="text-xs text-[#7C8C85] flex items-center gap-1">
                            <i class="bi bi-box-seam"></i> المخزون: {{ $product->stock }} قطعة
                        </span>
                        <span class="text-xs text-[#C9820A] font-bold flex items-center gap-0.5">
                            <i class="bi bi-star-fill"></i> 4.8
                        </span>
                    </div>

                    <!-- الاسم -->
                    <h2 class="text-2xl md:text-3xl font-extrabold text-[#0F2A1E] leading-tight font-['IBM_Plex_Sans_Arabic',sans-serif]">
                        {{ $product->name }}
                    </h2>

                    <!-- الكود -->
                    <p class="text-xs text-[#A2B0AA] mt-1.5">
                        <i class="bi bi-upc-scan"></i> SKU: {{ $product->sku ?? 'N/A' }}
                    </p>

                    <!-- المواصفات -->
                    <div class="mt-6 bg-[#F7F8F6] border border-[#E4EAE7] rounded-2xl p-5">
                        <h4 class="text-sm font-bold text-[#0F2A1E] flex items-center gap-2 mb-3">
                            <i class="bi bi-info-circle text-[#1E8A63]"></i> المواصفات الفنية
                        </h4>
                        <div class="text-sm text-[#4B5D55] leading-relaxed whitespace-pre-line">
                            {!! $product->description ?? 'لا توجد تفاصيل إضافية مسجلة لهذه القطعة حالياً.' !!}
                        </div>
                    </div>

                    <!-- المميزات (إذا وجدت) -->
                    @if($product->features)
                        <div class="mt-4 grid grid-cols-2 gap-2">
                            @foreach($product->features as $feature)
                                <div class="flex items-center gap-2 text-xs text-[#4B5D55] bg-[#F7F8F6] px-3 py-2 rounded-xl border border-[#E4EAE7]">
                                    <i class="bi bi-check-circle-fill text-[#1E8A63] text-[10px]"></i>
                                    {{ $feature }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- ===== كارت السعر والشراء ===== -->
                <div class="bg-[#0F2A1E] rounded-2xl p-6">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-5">
                        <div class="text-center sm:text-right">
                            <span class="text-[10px] text-[#B7CFC4] font-semibold">السعر شامل الضريبة</span>
                            <div class="text-3xl md:text-4xl font-extrabold text-white">
                                {{ number_format($product->price) }}
                                <span class="text-sm font-normal text-[#B7CFC4]">ج.م</span>
                            </div>
                            @if($product->old_price)
                                <span class="text-sm text-white/40 line-through block">
                                    {{ number_format($product->old_price) }} ج.م
                                </span>
                            @endif
                        </div>

                        <div class="flex flex-wrap justify-center gap-3">
                            @if($product->stock > 0)
                                <button wire:click="addToCart({{ $product->id }})"
                                    class="px-8 py-3.5 bg-[#3EB489] text-[#0F2A1E] font-bold rounded-xl text-sm hover:bg-[#4ECBA0] transition flex items-center gap-2">
                                    <i class="bi bi-cart-plus"></i> أضف للسلة
                                </button>
                                <a href="{{ route('shop.home') }}"
                                   class="px-6 py-3.5 border border-white/20 text-white font-bold rounded-xl text-sm hover:border-white/40 transition flex items-center gap-2">
                                    <i class="bi bi-arrow-left"></i> متابعة التسوق
                                </a>
                            @else
                                <span class="text-sm text-[#C0392B] font-bold bg-white px-6 py-3 rounded-xl flex items-center gap-2">
                                    <i class="bi bi-x-circle"></i> غير متوفر حالياً
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- شروط الشراء -->
                    <div class="flex flex-wrap items-center justify-center sm:justify-start gap-4 mt-5 pt-5 border-t border-white/10 text-[11px] text-[#B7CFC4]">
                        <span class="flex items-center gap-1.5">
                            <i class="bi bi-truck text-[#3EB489]"></i> شحن سريع
                        </span>
                        <span class="flex items-center gap-1.5">
                            <i class="bi bi-arrow-repeat text-[#3EB489]"></i> إرجاع مجاني
                        </span>
                        <span class="flex items-center gap-1.5">
                            <i class="bi bi-shield-check text-[#3EB489]"></i> ضمان الجودة
                        </span>
                        <span class="flex items-center gap-1.5">
                            <i class="bi bi-credit-card text-[#3EB489]"></i> دفع آمن
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== منتجات مشابهة ===== -->
        @if(isset($similarProducts) && $similarProducts && $similarProducts->count() > 0)
            <div class="mt-16">
                <h3 class="text-2xl font-extrabold text-[#0F2A1E] mb-6 flex items-center gap-3 font-['IBM_Plex_Sans_Arabic',sans-serif]">
                    <i class="bi bi-lightning-charge-fill text-[#1E8A63]"></i> قد يعجبك أيضاً
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    @foreach($similarProducts as $similar)
                        <div class="group bg-white border border-[#E4EAE7] rounded-2xl overflow-hidden hover:border-[#3EB489]/50 hover:shadow-[0_12px_30px_-12px_rgba(15,42,30,0.18)] transition-all duration-300">
                            <div class="relative h-40 bg-[#F2F5F3] overflow-hidden">
                                @if($similar->image)
                                    <a href="{{ route('shop.product.show', $similar->slug) }}">
                                        <img src="{{ asset('storage/' . $similar->image) }}"
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                             alt="{{ $similar->name }}">
                                    </a>
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-[#C7D3CD]">
                                        <i class="bi bi-hdd-stack text-5xl"></i>
                                    </div>
                                @endif
                                @if($similar->stock > 0)
                                    <span class="absolute top-2 right-2 px-2 py-0.5 text-[8px] font-bold bg-white/95 text-[#1E8A63] rounded-lg">
                                        متوفر
                                    </span>
                                @else
                                    <span class="absolute top-2 right-2 px-2 py-0.5 text-[8px] font-bold bg-white/95 text-[#C0392B] rounded-lg">
                                        نفذ
                                    </span>
                                @endif
                            </div>
                            <div class="p-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-[8px] font-bold text-[#1E8A63] bg-[#EAF5EF] px-2 py-0.5 rounded-full">
                                        {{ $similar->category->name ?? '' }}
                                    </span>
                                    <span class="text-[10px] text-[#C9820A] font-bold flex items-center gap-0.5">
                                        <i class="bi bi-star-fill text-[8px]"></i> 4.8
                                    </span>
                                </div>
                                <h4 class="text-sm font-bold text-[#0F2A1E] truncate mt-1.5">
                                    <a href="{{ route('shop.product.show', $similar->slug) }}" class="hover:text-[#1E8A63] transition">
                                        {{ $similar->name }}
                                    </a>
                                </h4>
                                <p class="text-sm font-extrabold text-[#0F2A1E] mt-1">
                                    {{ number_format($similar->price) }}
                                    <span class="text-[10px] font-normal text-[#A2B0AA]">ج.م</span>
                                </p>
                                @if($similar->stock > 0)
                                    <button wire:click="addToCart({{ $similar->id }})"
                                        class="mt-2.5 w-full py-1.5 bg-[#0F2A1E] text-white font-bold rounded-lg text-[10px] hover:bg-[#3EB489] hover:text-[#0F2A1E] transition flex items-center justify-center gap-1">
                                        <i class="bi bi-cart-plus"></i> إضافة
                                    </button>
                                @else
                                    <span class="mt-2.5 w-full py-1.5 text-[10px] text-[#C0392B] font-bold bg-[#FBEAE8] rounded-lg flex items-center justify-center gap-1">
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
        <div class="text-center mt-10">
            <a href="#" onclick="window.scrollTo({top:0,behavior:'smooth'})"
               class="inline-flex items-center gap-2 text-sm text-[#7C8C85] hover:text-[#1E8A63] transition">
                <i class="bi bi-arrow-up-circle-fill"></i> العودة للأعلى
            </a>
        </div>
    </div>
</div>