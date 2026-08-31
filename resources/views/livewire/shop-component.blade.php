<div class="min-h-screen bg-[#F7F8F6] font-['Tajawal',sans-serif]" dir="rtl">

    <!-- ============================================================== -->
    <!-- 🚀 الهيدر العلوي -->
    <!-- ============================================================== -->
    <header class="bg-white/90 backdrop-blur-xl border-b border-[#E4EAE7] sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <!-- الشعار -->
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-[#0F2A1E] flex items-center justify-center shadow-lg shadow-[#0F2A1E]/10">
                        <i class="bi bi-cpu text-[#3EB489] text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-extrabold text-[#0F2A1E]">Core <span class="text-[#1E8A63]">Tech</span></h1>
                        <p class="text-[9px] tracking-[0.15em] text-[#7C8C85] uppercase font-semibold">Hardware Store</p>
                    </div>
                </div>

                <!-- الروابط مع السلة -->
                <div class="flex items-center gap-4">
                    @livewire('cart')

                    @auth
                        <a href="/admin" class="text-sm bg-[#0F2A1E] text-white px-4 py-2.5 rounded-xl font-bold hover:bg-[#173F2C] transition shadow-lg shadow-[#0F2A1E]/20 hover:shadow-xl">
                            <i class="bi bi-speedometer2"></i> لوحة التحكم
                        </a>
                    @else
                        <a href="/login" class="text-sm bg-[#0F2A1E] text-white px-4 py-2.5 rounded-xl font-bold hover:bg-[#173F2C] transition shadow-lg shadow-[#0F2A1E]/20 hover:shadow-xl">
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
        <div class="relative overflow-hidden rounded-[28px] bg-gradient-to-br from-[#0F2A1E] to-[#1A3D2E] p-8 md:p-14 mb-8 shadow-2xl shadow-[#0F2A1E]/20 animate-heroIn">
            <div class="absolute inset-0 opacity-[0.04]" style="background-image: radial-gradient(#3EB489 2px, transparent 2px); background-size: 24px 24px;"></div>
            <div class="absolute -left-16 top-1/3 text-[#3EB489]/10 text-[160px] leading-none">
                <i class="bi bi-cpu-fill"></i>
            </div>
            <div class="absolute -right-10 bottom-10 text-[#3EB489]/10 text-[120px] leading-none">
                <i class="bi bi-motherboard-fill"></i>
            </div>

            <div class="relative z-10 max-w-2xl">
                <p class="text-[#3EB489] text-xs font-bold tracking-wide mb-4 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#3EB489] animate-pulse"></span>
                    تجميعات جيمنج وقطع أصلية 100%
                </p>
                <h2 class="text-3xl md:text-[3.4rem] font-extrabold text-white leading-[1.1]">
                    ابنِ تجميعتك،<br>بأفضل الأسعار
                </h2>
                <p class="text-[#B7CFC4] mt-4 max-w-md text-sm leading-relaxed">
                    أكثر من 300 قطعة هاردوير من أفضل الماركات العالمية، مع ضمان أصالة وتوصيل لكل المحافظات.
                </p>

                <div class="flex flex-wrap gap-3 mt-8">
                    <a href="#products" class="px-6 py-3.5 bg-[#3EB489] text-[#0F2A1E] font-bold rounded-xl text-sm hover:bg-[#4ECBA0] transition shadow-lg shadow-[#3EB489]/30 hover:shadow-[#3EB489]/50 flex items-center gap-2 transform hover:scale-105 transition-all duration-300">
                        <i class="bi bi-search"></i> استعرض القطع
                    </a>
                    <a href="#" class="px-6 py-3.5 text-white font-bold rounded-xl text-sm border border-white/20 hover:border-white/40 hover:bg-white/5 transition flex items-center gap-2">
                        <i class="bi bi-fire"></i> عروض اليوم
                    </a>
                </div>

                <!-- شريط ثقة داخل الهيرو -->
                <div class="flex flex-wrap items-center gap-x-8 gap-y-3 mt-10 pt-6 border-t border-white/10">
                    <div class="flex items-center gap-2 text-sm text-[#B7CFC4]">
                        <i class="bi bi-patch-check-fill text-[#3EB489]"></i> ضمان أصالة
                    </div>
                    <div class="flex items-center gap-2 text-sm text-[#B7CFC4]">
                        <i class="bi bi-truck text-[#3EB489]"></i> توصيل 2-5 أيام
                    </div>
                    <div class="flex items-center gap-2 text-sm text-[#B7CFC4]">
                        <i class="bi bi-headset text-[#3EB489]"></i> دعم فني 24/7
                    </div>
                </div>
            </div>

            <!-- بطاقة إحصائية عائمة -->
            <div class="hidden lg:flex absolute left-14 bottom-14 items-center gap-3 bg-white/95 backdrop-blur rounded-2xl px-5 py-4 shadow-2xl">
                <div class="flex items-center -space-x-2 space-x-reverse">
                    <div class="w-8 h-8 rounded-full bg-[#0F2A1E] border-2 border-white flex items-center justify-center text-[10px] text-[#3EB489]"><i class="bi bi-person-fill"></i></div>
                    <div class="w-8 h-8 rounded-full bg-[#1E8A63] border-2 border-white flex items-center justify-center text-[10px] text-white"><i class="bi bi-person-fill"></i></div>
                    <div class="w-8 h-8 rounded-full bg-[#3EB489] border-2 border-white flex items-center justify-center text-[10px] text-[#0F2A1E]"><i class="bi bi-person-fill"></i></div>
                </div>
                <div>
                    <p class="text-sm font-extrabold text-[#0F2A1E]">+10,000 عميل</p>
                    <p class="text-xs text-[#7C8C85] flex items-center gap-1">
                        <i class="bi bi-star-fill text-[#C9820A] text-[10px]"></i> 4.9 تقييم العملاء
                    </p>
                </div>
            </div>
        </div>

        <!-- ===== بطاقة فلترة القطع ===== -->
        <div class="bg-white rounded-[24px] border border-[#E4EAE7] p-6 md:p-7 mb-12 shadow-[0_4px_20px_-10px_rgba(15,42,30,0.08)] hover:shadow-[0_8px_30px_-12px_rgba(15,42,30,0.12)] transition-shadow duration-300">
            <h3 class="text-base font-extrabold text-[#0F2A1E] mb-4">دوّر على القطعة اللي محتاجها</h3>
            <div class="flex items-center gap-2 overflow-x-auto pb-1 custom-scrollbar">
                <button wire:click="filterCategory(null)"
                    class="px-5 py-2.5 rounded-xl text-sm font-bold transition-all duration-200 shrink-0 whitespace-nowrap flex items-center gap-2
                    {{ is_null($selectedCategory)
                        ? 'bg-[#0F2A1E] text-white shadow-lg shadow-[#0F2A1E]/20'
                        : 'bg-[#F2F5F3] text-[#4B5D55] hover:bg-[#E9F3EE] hover:text-[#1E8A63] hover:shadow-md'
                    }}">
                    <i class="bi bi-grid-fill"></i> جميع القطع
                </button>
                @foreach($categories as $category)
                    <button wire:click="filterCategory({{ $category->id }})"
                        class="px-5 py-2.5 rounded-xl text-sm font-bold transition-all duration-200 shrink-0 whitespace-nowrap flex items-center gap-2
                        {{ $selectedCategory == $category->id
                            ? 'bg-[#0F2A1E] text-white shadow-lg shadow-[#0F2A1E]/20'
                            : 'bg-[#F2F5F3] text-[#4B5D55] hover:bg-[#E9F3EE] hover:text-[#1E8A63] hover:shadow-md'
                        }}">
                        <i class="bi bi-tag-fill"></i> {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- ===== الإشعارات ===== -->
        @if (session()->has('success'))
            <div class="mb-6 p-4 bg-[#EAF5EF] border border-[#CFE9DC] rounded-2xl text-[#1E8A63] flex items-center gap-3 animate-slideDown">
                <i class="bi bi-check-circle-fill text-xl text-[#3EB489]"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="mb-6 p-4 bg-[#FBEAE8] border border-[#F1C7C1] rounded-2xl text-[#C0392B] flex items-center gap-3 animate-slideDown">
                <i class="bi bi-exclamation-circle-fill text-xl text-[#C0392B]"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <!-- ===== المنتجات ===== -->
        <div id="products" class="flex items-center justify-between mb-5">
            <h3 class="text-2xl font-extrabold text-[#0F2A1E] flex items-center gap-2">
                <i class="bi bi-grid-3x3-gap-fill text-[#1E8A63]"></i>
                القطع المتاحة
                <span class="text-sm font-normal text-[#7C8C85]">({{ $products->count() }})</span>
            </h3>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
            @forelse($products as $product)
                <div class="group bg-white border border-[#E4EAE7] rounded-2xl overflow-hidden hover:border-[#3EB489]/50 hover:shadow-[0_12px_40px_-12px_rgba(15,42,30,0.18)] transition-all duration-300 transform hover:-translate-y-1">

                    <!-- صورة المنتج -->
                    <div class="relative h-44 bg-[#F2F5F3] overflow-hidden">
                        @if($product->image)
                            <a href="{{ route('shop.product.show', $product->slug) }}">
                                <img src="{{ asset('storage/' . $product->image) }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                     alt="{{ $product->name }}">
                            </a>
                        @else
                            <div class="w-full h-full flex items-center justify-center text-[#C7D3CD]">
                                <i class="bi bi-hdd-stack text-6xl"></i>
                            </div>
                        @endif

                        <!-- حالة المخزون -->
                        <div class="absolute top-3 right-3">
                            @if($product->stock > 0)
                                <span class="px-2.5 py-1 text-[10px] font-bold bg-white/95 text-[#1E8A63] rounded-lg flex items-center gap-1 shadow-md">
                                    <i class="bi bi-check-circle-fill text-[8px]"></i> متوفر
                                </span>
                            @else
                                <span class="px-2.5 py-1 text-[10px] font-bold bg-white/95 text-[#C0392B] rounded-lg flex items-center gap-1 shadow-md">
                                    <i class="bi bi-x-circle-fill text-[8px]"></i> نفذ
                                </span>
                            @endif
                        </div>

                        <!-- زر التفاصيل -->
                        <a href="{{ route('shop.product.show', $product->slug) }}"
                           class="absolute inset-0 bg-[#0F2A1E]/0 group-hover:bg-[#0F2A1E]/70 transition-colors duration-300 flex items-center justify-center">
                            <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 px-5 py-2 bg-white text-[#0F2A1E] font-bold rounded-xl text-xs flex items-center gap-2 shadow-lg transform group-hover:scale-105 transition-all duration-300">
                                <i class="bi bi-eye"></i> عرض التفاصيل
                            </span>
                        </a>
                    </div>

                    <!-- معلومات المنتج -->
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[9px] font-bold text-[#1E8A63] bg-[#EAF5EF] px-2.5 py-0.5 rounded-full flex items-center gap-1">
                                <i class="bi bi-tag-fill text-[8px]"></i> {{ $product->category->name }}
                            </span>
                            <span class="text-xs text-[#C9820A] font-bold flex items-center gap-0.5">
                                <i class="bi bi-star-fill text-[10px]"></i> 4.8
                            </span>
                        </div>

                        <a href="{{ route('shop.product.show', $product->slug) }}">
                            <h3 class="text-sm font-bold text-[#0F2A1E] group-hover:text-[#1E8A63] transition line-clamp-1">
                                {{ $product->name }}
                            </h3>
                        </a>

                        <p class="text-xs text-[#7C8C85] mt-1.5 line-clamp-2 leading-relaxed">
                            {{ $product->description }}
                        </p>

                        <div class="mt-4 flex items-center justify-between pt-3 border-t border-[#EEF2F0]">
                            <div>
                                <span class="text-[10px] text-[#A2B0AA] font-semibold">السعر</span>
                                <div class="text-lg font-extrabold text-[#0F2A1E]">
                                    {{ number_format($product->price) }}
                                    <span class="text-[10px] font-normal text-[#A2B0AA]">ج.م</span>
                                </div>
                            </div>

                            @if($product->stock > 0)
                                <button wire:click="addToCart({{ $product->id }})"
                                    class="px-4 py-2.5 bg-[#0F2A1E] text-white font-bold rounded-xl text-[10px] hover:bg-[#3EB489] hover:text-[#0F2A1E] transition shadow-md hover:shadow-lg flex items-center gap-1.5 transform hover:scale-105 transition-all duration-300">
                                    <i class="bi bi-cart-plus"></i> إضافة
                                </button>
                            @else
                                <span class="text-[10px] text-[#C0392B] font-bold bg-[#FBEAE8] px-3 py-1.5 rounded-lg flex items-center gap-1">
                                    <i class="bi bi-x-circle"></i> نفد
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center py-20 text-center">
                    <div class="w-28 h-28 rounded-full bg-[#F2F5F3] flex items-center justify-center mb-6">
                        <i class="bi bi-hdd-stack text-5xl text-[#C7D3CD]"></i>
                    </div>
                    <p class="text-[#0F2A1E] text-base font-bold">لا توجد قطع متاحة</p>
                    <p class="text-[#7C8C85] text-sm mt-1">جرب تغيير التصنيف المحدد</p>
                </div>
            @endforelse
        </div>

        <!-- ===== أكثر المنتجات طلباً ===== -->
        <div class="mt-16">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-2xl font-extrabold text-[#0F2A1E] flex items-center gap-3">
                    <i class="bi bi-fire text-[#1E8A63]"></i>
                    أكثر المنتجات طلباً
                    <span class="text-sm font-normal text-[#7C8C85]">(الأكثر مبيعاً)</span>
                </h3>
                <a href="#" class="text-sm text-[#1E8A63] hover:text-[#3EB489] transition flex items-center gap-1 hover:gap-2 transition-all duration-300">
                    عرض الكل <i class="bi bi-arrow-left"></i>
                </a>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @php
                    $topProducts = \App\Models\Product::where('is_active', true)
                        ->orderBy('id', 'desc')
                        ->limit(4)
                        ->get();
                @endphp
                @forelse($topProducts as $product)
                    <div class="bg-white border border-[#E4EAE7] rounded-2xl p-4 text-center hover:border-[#3EB489]/50 hover:shadow-[0_8px_25px_-8px_rgba(15,42,30,0.12)] transition-all duration-300 hover:-translate-y-1">
                        <div class="w-16 h-16 mx-auto rounded-full bg-[#F2F5F3] overflow-hidden mb-3 border-2 border-[#E4EAE7] group-hover:border-[#3EB489]/30 transition">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-[#C7D3CD]">
                                    <i class="bi bi-hdd-stack text-2xl"></i>
                                </div>
                            @endif
                        </div>
                        <h4 class="text-sm font-bold text-[#0F2A1E] truncate">{{ $product->name }}</h4>
                        <p class="text-xs text-[#1E8A63] font-bold mt-1">{{ number_format($product->price) }} <span class="text-[10px] font-normal text-[#A2B0AA]">ج.م</span></p>
                        <button wire:click="addToCart({{ $product->id }})"
                                class="mt-2 px-4 py-1.5 bg-[#EAF5EF] text-[#1E8A63] font-bold rounded-lg text-[10px] hover:bg-[#0F2A1E] hover:text-white transition border border-[#CFE9DC] hover:border-[#0F2A1E]">
                            <i class="bi bi-cart-plus"></i> إضافة
                        </button>
                    </div>
                @empty
                    <p class="text-[#7C8C85] text-sm col-span-full text-center">لا توجد منتجات</p>
                @endforelse
            </div>
        </div>

        <!-- ===== عرض حصري ===== -->
        <div class="relative mt-16 overflow-hidden rounded-[28px] bg-gradient-to-r from-[#0F2A1E] to-[#1A3D2E] p-8 md:p-12 shadow-2xl shadow-[#0F2A1E]/20">
            <div class="absolute -top-20 -left-20 w-64 h-64 bg-[#3EB489]/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-[#3EB489]/10 rounded-full blur-3xl"></div>
            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-right">
                <div>
                    <span class="inline-block text-xs font-bold text-[#3EB489] bg-white/10 px-4 py-1.5 rounded-full mb-3 border border-[#3EB489]/20">
                        <i class="bi bi-gift-fill"></i> عرض محدود
                    </span>
                    <h3 class="text-2xl md:text-3xl font-extrabold text-white">
                        خصم <span class="text-[#3EB489]">20%</span> على أول طلب
                    </h3>
                    <p class="text-[#B7CFC4] mt-2 text-sm max-w-md">
                        اشترك الآن واحصل على خصم 20% على أول عملية شراء. العرض ساري لفترة محدودة.
                    </p>
                </div>
                <a href="#" class="shrink-0 px-8 py-3.5 bg-[#3EB489] text-[#0F2A1E] font-bold rounded-xl hover:bg-[#4ECBA0] transition shadow-lg shadow-[#3EB489]/30 hover:shadow-[#3EB489]/50 flex items-center gap-2 transform hover:scale-105 transition-all duration-300">
                    <i class="bi bi-envelope-paper-fill"></i> اشترك الآن
                </a>
            </div>
        </div>

        <!-- ===== آراء العملاء ===== -->
        <div class="mt-16">
            <h3 class="text-2xl font-extrabold text-[#0F2A1E] flex items-center gap-3 mb-5">
                <i class="bi bi-chat-quote text-[#1E8A63]"></i>
                آراء العملاء
                <span class="text-sm font-normal text-[#7C8C85]">(ما يقوله عملاؤنا)</span>
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="bg-white border border-[#E4EAE7] rounded-2xl p-6 hover:border-[#3EB489]/30 hover:shadow-[0_8px_25px_-8px_rgba(15,42,30,0.10)] transition-all duration-300">
                    <div class="flex items-center gap-1 text-[#C9820A] mb-3">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-sm text-[#4B5D55] leading-relaxed">"من أفضل المتاجر التي تعاملت معها. قطع أصلية بأسعار ممتازة وسرعة في التوصيل."</p>
                    <div class="mt-4 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-[#EAF5EF] flex items-center justify-center">
                            <i class="bi bi-person text-[#1E8A63]"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#0F2A1E]">أحمد محمد</h4>
                            <p class="text-[10px] text-[#A2B0AA]">عميل مميز</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white border border-[#E4EAE7] rounded-2xl p-6 hover:border-[#3EB489]/30 hover:shadow-[0_8px_25px_-8px_rgba(15,42,30,0.10)] transition-all duration-300">
                    <div class="flex items-center gap-1 text-[#C9820A] mb-3">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-sm text-[#4B5D55] leading-relaxed">"تجميعتي كانت مثالية بفضل مساعدتهم في اختيار القطع المناسبة. أنصح الجميع بالتجربة."</p>
                    <div class="mt-4 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-[#EAF5EF] flex items-center justify-center">
                            <i class="bi bi-person text-[#1E8A63]"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#0F2A1E]">سارة علي</h4>
                            <p class="text-[10px] text-[#A2B0AA]">مصممة جرافيك</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white border border-[#E4EAE7] rounded-2xl p-6 hover:border-[#3EB489]/30 hover:shadow-[0_8px_25px_-8px_rgba(15,42,30,0.10)] transition-all duration-300">
                    <div class="flex items-center gap-1 text-[#C9820A] mb-3">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-sm text-[#4B5D55] leading-relaxed">"خدمة عملاء ممتازة ودعم فني على أعلى مستوى. بالتأكيد سأتعامل معهم مرة أخرى."</p>
                    <div class="mt-4 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-[#EAF5EF] flex items-center justify-center">
                            <i class="bi bi-person text-[#1E8A63]"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-[#0F2A1E]">خالد يوسف</h4>
                            <p class="text-[10px] text-[#A2B0AA]">مهندس برمجيات</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== الأسئلة الشائعة ===== -->
        <div class="mt-16">
            <h3 class="text-2xl font-extrabold text-[#0F2A1E] flex items-center gap-3 mb-5">
                <i class="bi bi-question-circle text-[#1E8A63]"></i>
                الأسئلة الشائعة
                <span class="text-sm font-normal text-[#7C8C85]">(كل ما تريد معرفته)</span>
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white border border-[#E4EAE7] rounded-2xl p-5 hover:border-[#3EB489]/30 hover:shadow-[0_4px_15px_-6px_rgba(15,42,30,0.08)] transition-all duration-300">
                    <h4 class="text-sm font-bold text-[#0F2A1E] flex items-center gap-2">
                        <i class="bi bi-question-circle text-[#1E8A63] text-xs"></i>
                        ما هي مدة التوصيل؟
                    </h4>
                    <p class="text-sm text-[#7C8C85] mt-2 leading-relaxed">مدة التوصيل تتراوح بين 2-5 أيام عمل حسب المنطقة. نوفر خدمة شحن سريع لجميع المحافظات.</p>
                </div>
                <div class="bg-white border border-[#E4EAE7] rounded-2xl p-5 hover:border-[#3EB489]/30 hover:shadow-[0_4px_15px_-6px_rgba(15,42,30,0.08)] transition-all duration-300">
                    <h4 class="text-sm font-bold text-[#0F2A1E] flex items-center gap-2">
                        <i class="bi bi-question-circle text-[#1E8A63] text-xs"></i>
                        هل المنتجات أصلية 100%؟
                    </h4>
                    <p class="text-sm text-[#7C8C85] mt-2 leading-relaxed">نعم، جميع منتجاتنا أصلية ومضمونة من أفضل الماركات العالمية. نوفر ضمان الجودة على جميع القطع.</p>
                </div>
                <div class="bg-white border border-[#E4EAE7] rounded-2xl p-5 hover:border-[#3EB489]/30 hover:shadow-[0_4px_15px_-6px_rgba(15,42,30,0.08)] transition-all duration-300">
                    <h4 class="text-sm font-bold text-[#0F2A1E] flex items-center gap-2">
                        <i class="bi bi-question-circle text-[#1E8A63] text-xs"></i>
                        كيف يمكنني الإرجاع؟
                    </h4>
                    <p class="text-sm text-[#7C8C85] mt-2 leading-relaxed">يمكنك الإرجاع خلال 14 يوماً من تاريخ الاستلام بشرط أن تكون القطع بحالتها الأصلية. تواصل مع خدمة العملاء.</p>
                </div>
                <div class="bg-white border border-[#E4EAE7] rounded-2xl p-5 hover:border-[#3EB489]/30 hover:shadow-[0_4px_15px_-6px_rgba(15,42,30,0.08)] transition-all duration-300">
                    <h4 class="text-sm font-bold text-[#0F2A1E] flex items-center gap-2">
                        <i class="bi bi-question-circle text-[#1E8A63] text-xs"></i>
                        هل يوجد ضمان على القطع؟
                    </h4>
                    <p class="text-sm text-[#7C8C85] mt-2 leading-relaxed">جميع القطع تأتي بضمان يصل إلى عامين حسب نوع المنتج. الضمان يشمل عيوب التصنيع فقط.</p>
                </div>
            </div>
        </div>
    </main>

    <!-- ============================================================== -->
    <!-- 📱 Footer -->
    <!-- ============================================================== -->
    <footer class="bg-[#0F2A1E] mt-16">
        <div class="max-w-7xl mx-auto px-4 md:px-8 py-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h4 class="text-sm font-bold text-[#3EB489] mb-4 flex items-center gap-2">
                        <i class="bi bi-cpu"></i> Core Tech
                    </h4>
                    <ul class="space-y-2 text-sm text-white/50">
                        <li><a href="#" class="hover:text-[#3EB489] transition flex items-center gap-2"><i class="bi bi-chevron-left text-[8px]"></i> من نحن</a></li>
                        <li><a href="#" class="hover:text-[#3EB489] transition flex items-center gap-2"><i class="bi bi-chevron-left text-[8px]"></i> اتصل بنا</a></li>
                        <li><a href="#" class="hover:text-[#3EB489] transition flex items-center gap-2"><i class="bi bi-chevron-left text-[8px]"></i> الشروط والأحكام</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-[#3EB489] mb-4 flex items-center gap-2">
                        <i class="bi bi-shop"></i> تسوق
                    </h4>
                    <ul class="space-y-2 text-sm text-white/50">
                        <li><a href="#" class="hover:text-[#3EB489] transition flex items-center gap-2"><i class="bi bi-chevron-left text-[8px]"></i> معالجات</a></li>
                        <li><a href="#" class="hover:text-[#3EB489] transition flex items-center gap-2"><i class="bi bi-chevron-left text-[8px]"></i> كروت الشاشة</a></li>
                        <li><a href="#" class="hover:text-[#3EB489] transition flex items-center gap-2"><i class="bi bi-chevron-left text-[8px]"></i> مذربورد</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-[#3EB489] mb-4 flex items-center gap-2">
                        <i class="bi bi-headset"></i> الدعم
                    </h4>
                    <ul class="space-y-2 text-sm text-white/50">
                        <li><a href="#" class="hover:text-[#3EB489] transition flex items-center gap-2"><i class="bi bi-chevron-left text-[8px]"></i> الأسئلة الشائعة</a></li>
                        <li><a href="#" class="hover:text-[#3EB489] transition flex items-center gap-2"><i class="bi bi-chevron-left text-[8px]"></i> سياسة الإرجاع</a></li>
                        <li><a href="#" class="hover:text-[#3EB489] transition flex items-center gap-2"><i class="bi bi-chevron-left text-[8px]"></i> الشحن والتوصيل</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-[#3EB489] mb-4 flex items-center gap-2">
                        <i class="bi bi-share-fill"></i> تابعنا
                    </h4>
                    <div class="flex gap-3 text-white/50">
                        <a href="#" class="w-10 h-10 rounded-full border border-white/15 flex items-center justify-center hover:border-[#3EB489] hover:text-[#3EB489] hover:bg-[#3EB489]/10 transition">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full border border-white/15 flex items-center justify-center hover:border-[#3EB489] hover:text-[#3EB489] hover:bg-[#3EB489]/10 transition">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full border border-white/15 flex items-center justify-center hover:border-[#3EB489] hover:text-[#3EB489] hover:bg-[#3EB489]/10 transition">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full border border-white/15 flex items-center justify-center hover:border-[#3EB489] hover:text-[#3EB489] hover:bg-[#3EB489]/10 transition">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="text-center text-xs text-white/25 border-t border-white/10 pt-6 mt-6">
                <i class="bi bi-cpu"></i> Core Tech &copy; {{ date('Y') }} — جميع الحقوق محفوظة
            </div>
        </div>
    </footer>

    <!-- ============================================================== -->
    <!-- ✅ زر واتساب المتحرك -->
    <!-- ============================================================== -->
    <a href="https://wa.me/201090718857?text=مرحباً%20أرغب%20في%20الاستفسار%20عن%20منتجات%20Core%20Tech"
       target="_blank"
       class="fixed bottom-6 left-6 z-50 group">
        <div class="relative">
            <span class="absolute inset-0 bg-[#25D366] rounded-full animate-ping opacity-60"></span>
            <span class="absolute inset-0 bg-[#25D366] rounded-full animate-pulse opacity-40"></span>
            <div class="relative w-16 h-16 bg-[#25D366] rounded-full flex items-center justify-center shadow-2xl shadow-[#25D366]/40 hover:scale-110 transition-transform duration-300">
                <i class="bi bi-whatsapp text-white text-3xl"></i>
            </div>
            <!-- نص توضيحي -->
            <span class="absolute -top-8 right-1/2 translate-x-1/2 bg-[#0F2A1E] text-white text-[10px] font-bold px-2 py-0.5 rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity border border-[#3EB489]/20">
                تواصل معنا
            </span>
        </div>
    </a>

    <!-- ============================================================== -->
    <!-- 🎨 التنسيقات الإضافية -->
    <!-- ============================================================== -->
    <style>
        /* ===== شريط التمرير ===== */
        .custom-scrollbar::-webkit-scrollbar { height: 3px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #F2F5F3; border-radius: 9999px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #3EB489; border-radius: 9999px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #1E8A63; }

        /* ===== تحديد النص ===== */
        ::selection { background: #3EB489; color: #0F2A1E; }

        /* ===== شريط التمرير الرئيسي ===== */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #F2F5F3; }
        ::-webkit-scrollbar-thumb { background: #3EB489; border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: #1E8A63; }

        /* ===== حركة الهيرو ===== */
        @keyframes heroIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-heroIn { animation: heroIn 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

        /* ===== حركة الإشعارات ===== */
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slideDown { animation: slideDown 0.5s ease-out forwards; }

        /* ===== نبض واتساب ===== */
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.4; }
            50% { transform: scale(1.3); opacity: 0; }
        }
        .animate-pulse { animation: pulse 2s ease-in-out infinite; }

        @media (prefers-reduced-motion: reduce) {
            .animate-heroIn { animation: none; opacity: 1; }
            .animate-slideDown { animation: none; opacity: 1; }
            .animate-ping { animation: none; }
            .animate-pulse { animation: none; }
        }
    </style>
</div>