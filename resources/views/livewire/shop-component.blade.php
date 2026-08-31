<div class="min-h-screen relative overflow-hidden bg-[#0a0a0f] font-['Orbitron','Tajawal',sans-serif]">
    
    <!-- ============================================================== -->
    <!-- 🌌 خلفية الشفق القطبي المتحرك (Aurora Background) -->
    <!-- ============================================================== -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-[#0a0a0f] via-[#1a0a2e] to-[#0a0a0f]"></div>
        
        <div class="aurora-container">
            <div class="aurora-wave aurora-1"></div>
            <div class="aurora-wave aurora-2"></div>
            <div class="aurora-wave aurora-3"></div>
            <div class="aurora-wave aurora-4"></div>
        </div>
        
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-cyan-500/10 rounded-full blur-[120px] animate-pulse-slow"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-fuchsia-500/10 rounded-full blur-[120px] animate-pulse-slow delay-1500"></div>
    </div>

    <!-- ============================================================== -->
    <!-- 🚀 الهيدر - شريط نيوني مستقبلي -->
    <!-- ============================================================== -->
    <header class="relative z-20 border-b border-cyan-500/20 bg-[#0a0a0f]/80 backdrop-blur-2xl">
        <div class="max-w-7xl mx-auto px-4 md:px-8 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="relative group">
                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-cyan-400 to-fuchsia-500 flex items-center justify-center shadow-[0_0_30px_rgba(6,182,212,0.3)]">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                            </svg>
                        </div>
                        <div class="absolute -inset-1 bg-gradient-to-r from-cyan-400 to-fuchsia-500 rounded-lg blur-xl opacity-0 group-hover:opacity-50 transition duration-700"></div>
                    </div>
                    <div>
                        <h1 class="text-2xl font-black tracking-widest">
                            <span class="bg-gradient-to-r from-cyan-400 via-fuchsia-400 to-cyan-400 bg-clip-text text-transparent bg-[length:200%_auto] animate-gradient">
                                CORE // TECH
                            </span>
                        </h1>
                        <p class="text-[8px] tracking-[0.3em] text-cyan-400/60 uppercase font-light">
                            ⟡ Hardware Matrix ⟡
                        </p>
                    </div>
                </div>
                
                <div class="flex items-center gap-6">
                    <div class="hidden md:flex items-center gap-6 text-xs text-cyan-400/60">
                        <a href="#" class="hover:text-cyan-400 transition border-b border-transparent hover:border-cyan-400 pb-1">المعالجات</a>
                        <a href="#" class="hover:text-cyan-400 transition border-b border-transparent hover:border-cyan-400 pb-1">كروت الشاشة</a>
                        <a href="#" class="hover:text-cyan-400 transition border-b border-transparent hover:border-cyan-400 pb-1">المذربورد</a>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <div class="w-10 h-10 rounded-full border border-cyan-500/20 bg-cyan-500/5 flex items-center justify-center text-cyan-400 hover:border-cyan-400 transition cursor-pointer group">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                <span class="absolute -top-1 -right-1 w-4 h-4 bg-fuchsia-500 text-[8px] text-white font-bold rounded-full flex items-center justify-center">{{ count($cart) }}</span>
                            </div>
                        </div>
                        @auth
                            <a href="/admin" class="px-4 py-2 text-xs font-bold text-white bg-gradient-to-r from-cyan-500 to-fuchsia-500 rounded-lg shadow-[0_0_20px_rgba(6,182,212,0.3)] hover:shadow-[0_0_40px_rgba(6,182,212,0.5)] transition-all duration-300 hover:scale-105">
                                ⚡ ADMIN
                            </a>
                        @else
                            <a href="/login" class="px-5 py-2 text-xs font-bold text-[#0a0a0f] bg-gradient-to-r from-cyan-400 to-fuchsia-500 rounded-lg shadow-[0_0_20px_rgba(6,182,212,0.3)] hover:shadow-[0_0_40px_rgba(6,182,212,0.5)] transition-all duration-300 hover:scale-105">
                                ⚡ LOGIN
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- ============================================================== -->
    <!-- 🎯 المحتوى الرئيسي -->
    <!-- ============================================================== -->
    <main class="relative z-10 max-w-7xl mx-auto px-4 md:px-8 py-8">
        
        <!-- ===== هيرو سيكشن ===== -->
        <div class="relative grid grid-cols-1 lg:grid-cols-5 gap-8 mb-16">
            <div class="lg:col-span-3 relative">
                <div class="relative">
                    <div class="absolute -top-12 -left-12 text-[120px] font-black text-cyan-500/5 tracking-[-0.1em] select-none">
                        #CORE
                    </div>
                    <div class="relative space-y-4">
                        <div class="inline-flex items-center gap-3 bg-cyan-500/10 border border-cyan-500/20 rounded-full px-4 py-1.5">
                            <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></span>
                            <span class="text-[9px] tracking-[0.2em] text-cyan-400 font-bold uppercase">نسخة تجريبية v3.0</span>
                        </div>
                        <h1 class="text-5xl md:text-7xl font-black leading-[1.05]">
                            <span class="text-white">ابني</span>
                            <br>
                            <span class="bg-gradient-to-r from-cyan-400 via-fuchsia-400 to-cyan-400 bg-clip-text text-transparent bg-[length:200%_auto] animate-gradient">
                                تجميعتك
                            </span>
                            <br>
                            <span class="text-white/60">الآن</span>
                        </h1>
                        <p class="text-sm text-cyan-400/60 max-w-md leading-relaxed tracking-wide">
                            اختر من بين <span class="text-cyan-400 font-bold">300+</span> قطعة هاردوير من أفضل الماركات العالمية.
                        </p>
                        <div class="flex flex-wrap gap-4 pt-4">
                            <a href="#products" class="group relative px-8 py-3.5 bg-gradient-to-r from-cyan-500 to-fuchsia-500 text-white font-bold rounded-lg overflow-hidden transition-all duration-300 hover:scale-105">
                                <span class="relative z-10 flex items-center gap-2">
                                    استكشف القطع
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </span>
                                <span class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-fuchsia-500 blur-xl opacity-0 group-hover:opacity-50 transition-opacity"></span>
                            </a>
                            <a href="#" class="px-8 py-3.5 border border-cyan-500/30 text-cyan-400 font-bold rounded-lg hover:bg-cyan-500/10 transition backdrop-blur">
                                عروض اليوم 🔥
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="lg:col-span-2 flex items-end justify-end">
                <div class="relative w-full max-w-xs bg-[#0a0a0f]/80 border border-cyan-500/10 rounded-2xl p-6 backdrop-blur-xl shadow-[0_0_60px_rgba(6,182,212,0.05)]">
                    <div class="absolute -top-3 -right-3 w-20 h-20 bg-gradient-to-br from-cyan-500 to-fuchsia-500 rounded-full blur-2xl opacity-20"></div>
                    <div class="space-y-6">
                        <div class="flex items-center justify-between border-b border-cyan-500/10 pb-4">
                            <span class="text-xs text-cyan-400/60 uppercase tracking-widest">المخزون المباشر</span>
                            <span class="text-2xl font-black text-cyan-400">308</span>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <span class="text-[8px] uppercase tracking-widest text-cyan-400/40">ماركات</span>
                                <p class="text-lg font-bold text-white">52+</p>
                            </div>
                            <div>
                                <span class="text-[8px] uppercase tracking-widest text-cyan-400/40">تقييم</span>
                                <p class="text-lg font-bold text-fuchsia-400">4.9 ★</p>
                            </div>
                            <div>
                                <span class="text-[8px] uppercase tracking-widest text-cyan-400/40">عملاء</span>
                                <p class="text-lg font-bold text-white">10K+</p>
                            </div>
                            <div>
                                <span class="text-[8px] uppercase tracking-widest text-cyan-400/40">متصل</span>
                                <p class="text-lg font-bold text-emerald-400">● Live</p>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -left-4 w-16 h-16 border border-cyan-500/10 rounded-full"></div>
                </div>
            </div>
        </div>

        <!-- ===== فلترة التصنيفات ===== -->
        <div class="mb-12">
            <div class="flex items-center gap-2 overflow-x-auto pb-4 custom-scrollbar">
                <button wire:click="filterCategory(null)" 
                    class="group relative px-6 py-3 rounded-xl text-xs font-bold tracking-widest transition-all duration-300 shrink-0 whitespace-nowrap
                    {{ is_null($selectedCategory) 
                        ? 'bg-gradient-to-r from-cyan-500 to-fuchsia-500 text-white shadow-[0_0_30px_rgba(6,182,212,0.3)]' 
                        : 'bg-[#0a0a0f]/60 border border-cyan-500/20 text-cyan-400/60 hover:text-cyan-400 hover:border-cyan-400 hover:shadow-[0_0_20px_rgba(6,182,212,0.1)]' 
                    }}">
                    <span class="relative z-10">⟡ جميع القطع</span>
                </button>
                @foreach($categories as $category)
                    <button wire:click="filterCategory({{ $category->id }})" 
                        class="px-6 py-3 rounded-xl text-xs font-bold tracking-widest transition-all duration-300 shrink-0 whitespace-nowrap
                        {{ $selectedCategory == $category->id 
                            ? 'bg-gradient-to-r from-cyan-500 to-fuchsia-500 text-white shadow-[0_0_30px_rgba(6,182,212,0.3)]' 
                            : 'bg-[#0a0a0f]/60 border border-cyan-500/20 text-cyan-400/60 hover:text-cyan-400 hover:border-cyan-400 hover:shadow-[0_0_20px_rgba(6,182,212,0.1)]' 
                        }}">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- ===== المنتجات ===== -->
        <div id="products" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($products as $product)
                <div class="group relative bg-[#0a0a0f]/60 backdrop-blur-xl border border-cyan-500/10 rounded-2xl overflow-hidden hover:border-cyan-500/40 transition-all duration-500 hover:shadow-[0_0_60px_rgba(6,182,212,0.1)] hover:-translate-y-2">
                    
                    <div class="absolute -top-32 -right-32 w-64 h-64 bg-gradient-to-br from-cyan-500/5 to-fuchsia-500/5 rounded-full blur-3xl group-hover:from-cyan-500/20 group-hover:to-fuchsia-500/20 transition-all duration-700"></div>
                    
                    <div class="relative h-52 bg-[#0a0a0f] overflow-hidden">
                        @if($product->image)
                            <a href="{{ route('shop.product.show', $product->slug) }}">
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                     alt="{{ $product->name }}">
                            </a>
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-16 h-16 text-cyan-500/20 group-hover:text-cyan-500/40 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        @endif
                        
                        <div class="absolute top-3 right-3 flex flex-col gap-1.5">
                            @if($product->stock > 0)
                                <span class="px-3 py-1 text-[8px] font-bold tracking-wider uppercase bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 rounded-lg backdrop-blur-sm">
                                    ● متوفر
                                </span>
                            @else
                                <span class="px-3 py-1 text-[8px] font-bold tracking-wider uppercase bg-red-500/20 text-red-400 border border-red-500/30 rounded-lg backdrop-blur-sm">
                                    ● نفذ
                                </span>
                            @endif
                        </div>
                        
                        <a href="{{ route('shop.product.show', $product->slug) }}" 
                           class="absolute inset-0 bg-[#0a0a0f]/80 backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center">
                            <span class="px-6 py-2.5 bg-gradient-to-r from-cyan-500 to-fuchsia-500 text-white font-bold rounded-lg text-sm shadow-[0_0_30px_rgba(6,182,212,0.3)] hover:scale-105 transition">
                                ◈ عرض التفاصيل
                            </span>
                        </a>
                    </div>
                    
                    <div class="relative z-10 p-5">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-[8px] font-bold tracking-[0.15em] uppercase text-cyan-400 bg-cyan-500/10 px-3 py-1 rounded-full border border-cyan-500/20">
                                {{ $product->category->name }}
                            </span>
                            <span class="text-xs text-fuchsia-400 font-bold">
                                ⚡ 4.8
                            </span>
                        </div>
                        
                        <a href="{{ route('shop.product.show', $product->slug) }}">
                            <h3 class="text-base font-bold text-white group-hover:text-cyan-400 transition line-clamp-1">
                                {{ $product->name }}
                            </h3>
                        </a>
                        
                        <p class="text-xs text-cyan-400/50 mt-2 line-clamp-2 leading-relaxed">
                            {{ $product->description }}
                        </p>
                        
                        <div class="mt-4 flex items-center justify-between pt-4 border-t border-cyan-500/10">
                            <div>
                                <span class="text-xs text-cyan-400/40 font-bold tracking-widest">السعر</span>
                                <div class="text-xl font-black text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-500">
                                    {{ number_format($product->price) }}
                                    <span class="text-[10px] font-normal text-cyan-400/40">ج.م</span>
                                </div>
                            </div>
                            
                            @if($product->stock > 0)
                                <button wire:click="addToCart({{ $product->id }})" 
                                    class="relative px-4 py-2.5 bg-gradient-to-r from-cyan-500 to-fuchsia-500 text-white font-bold rounded-lg text-[10px] overflow-hidden transition-all duration-300 hover:scale-105 active:scale-95 shadow-[0_0_20px_rgba(6,182,212,0.2)]">
                                    <span class="relative z-10 flex items-center gap-1.5">
                                        + إضافة
                                    </span>
                                </button>
                            @else
                                <span class="text-[10px] text-red-400 font-bold bg-red-500/10 border border-red-500/20 px-4 py-2 rounded-lg">
                                    ● نفد
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center py-24 text-center">
                    <div class="relative">
                        <div class="w-32 h-32 rounded-full bg-gradient-to-br from-cyan-500/10 to-fuchsia-500/10 flex items-center justify-center">
                            <svg class="w-16 h-16 text-cyan-500/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="absolute -inset-4 bg-gradient-to-r from-cyan-500 to-fuchsia-500 rounded-full blur-2xl opacity-10"></div>
                    </div>
                    <p class="text-cyan-400/60 text-base font-bold mt-6">لا توجد قطع متاحة</p>
                    <p class="text-cyan-400/30 text-sm mt-1">جرب تغيير التصنيف المحدد</p>
                </div>
            @endforelse
        </div>
        
        <!-- ===== عرض حصري ===== -->
        <div class="relative mt-16 overflow-hidden rounded-2xl bg-gradient-to-r from-cyan-500/10 via-fuchsia-500/10 to-cyan-500/10 border border-cyan-500/20 p-8 md:p-12">
            <div class="absolute -top-20 -right-20 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-fuchsia-500/10 rounded-full blur-3xl"></div>
            <div class="relative z-10 text-center">
                <span class="inline-block text-[8px] tracking-[0.2em] text-cyan-400 font-bold uppercase bg-cyan-500/10 border border-cyan-500/20 px-4 py-1.5 rounded-full mb-4">
                    ⟡ عرض محدود ⟡
                </span>
                <h3 class="text-2xl md:text-4xl font-black text-white">
                    خصم <span class="bg-gradient-to-r from-cyan-400 to-fuchsia-400 bg-clip-text text-transparent">20%</span> على أول طلب
                </h3>
                <p class="text-cyan-400/60 mt-2 text-sm max-w-md mx-auto">
                    اشترك الآن واحصل على خصم 20% على أول عملية شراء. العرض ساري لفترة محدودة!
                </p>
                <a href="#" class="inline-block mt-6 px-8 py-3.5 bg-gradient-to-r from-cyan-500 to-fuchsia-500 text-white font-bold rounded-lg shadow-[0_0_30px_rgba(6,182,212,0.3)] hover:shadow-[0_0_60px_rgba(6,182,212,0.5)] transition-all duration-300 hover:scale-105">
                    اشترك الآن ⚡
                </a>
            </div>
        </div>
    </main>

    <!-- ============================================================== -->
    <!-- 📱 Footer -->
    <!-- ============================================================== -->
    <footer class="relative z-10 border-t border-cyan-500/10 mt-16 bg-[#0a0a0f]/80 backdrop-blur-2xl">
        <div class="max-w-7xl mx-auto px-4 md:px-8 py-12">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h4 class="text-xs font-bold text-cyan-400 tracking-widest uppercase mb-4">⟡ Core Tech</h4>
                    <ul class="space-y-2 text-xs text-cyan-400/40">
                        <li><a href="#" class="hover:text-cyan-400 transition">من نحن</a></li>
                        <li><a href="#" class="hover:text-cyan-400 transition">اتصل بنا</a></li>
                        <li><a href="#" class="hover:text-cyan-400 transition">الشروط</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-cyan-400 tracking-widest uppercase mb-4">⟡ تسوق</h4>
                    <ul class="space-y-2 text-xs text-cyan-400/40">
                        <li><a href="#" class="hover:text-cyan-400 transition">المعالجات</a></li>
                        <li><a href="#" class="hover:text-cyan-400 transition">كروت الشاشة</a></li>
                        <li><a href="#" class="hover:text-cyan-400 transition">المذربورد</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-cyan-400 tracking-widest uppercase mb-4">⟡ الدعم</h4>
                    <ul class="space-y-2 text-xs text-cyan-400/40">
                        <li><a href="#" class="hover:text-cyan-400 transition">الأسئلة الشائعة</a></li>
                        <li><a href="#" class="hover:text-cyan-400 transition">سياسة الإرجاع</a></li>
                        <li><a href="#" class="hover:text-cyan-400 transition">الشحن</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-cyan-400 tracking-widest uppercase mb-4">⟡ تابعنا</h4>
                    <div class="flex gap-3 text-cyan-400/40">
                        <a href="#" class="hover:text-cyan-400 transition text-lg">⌘</a>
                        <a href="#" class="hover:text-cyan-400 transition text-lg">⌥</a>
                        <a href="#" class="hover:text-cyan-400 transition text-lg">⌃</a>
                        <a href="#" class="hover:text-cyan-400 transition text-lg">⇧</a>
                    </div>
                </div>
            </div>
            <div class="text-center text-[10px] text-cyan-400/20 border-t border-cyan-500/10 pt-6 mt-6 tracking-widest">
                ⟡ CORE // TECH — MATRIX v3.0 — ⟡
            </div>
        </div>
    </footer>

    <!-- ============================================================== -->
    <!-- 🎨 الأنماط (داخل الـ div الرئيسي) -->
    <!-- ============================================================== -->
    <style>
        /* الخطوط المميزة */
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=Tajawal:wght@300;400;500;700;800;900&display=swap');
        
        /* خلفية الشفق القطبي */
        .aurora-container {
            position: absolute;
            inset: 0;
            overflow: hidden;
        }
        
        .aurora-wave {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.3;
            animation: aurora 8s ease-in-out infinite alternate;
        }
        
        .aurora-1 {
            width: 80%;
            height: 60%;
            top: -10%;
            left: -20%;
            background: radial-gradient(ellipse, rgba(6, 182, 212, 0.4), transparent 70%);
            animation-duration: 10s;
        }
        
        .aurora-2 {
            width: 70%;
            height: 50%;
            bottom: -10%;
            right: -20%;
            background: radial-gradient(ellipse, rgba(192, 38, 211, 0.3), transparent 70%);
            animation-duration: 12s;
            animation-delay: -3s;
        }
        
        .aurora-3 {
            width: 60%;
            height: 40%;
            top: 20%;
            left: 30%;
            background: radial-gradient(ellipse, rgba(6, 182, 212, 0.2), transparent 70%);
            animation-duration: 14s;
            animation-delay: -6s;
        }
        
        .aurora-4 {
            width: 50%;
            height: 30%;
            bottom: 30%;
            right: 10%;
            background: radial-gradient(ellipse, rgba(192, 38, 211, 0.15), transparent 70%);
            animation-duration: 16s;
            animation-delay: -9s;
        }
        
        @keyframes aurora {
            0% {
                transform: translate(0, 0) scale(1) rotate(0deg);
                opacity: 0.2;
            }
            33% {
                transform: translate(5%, -5%) scale(1.1) rotate(5deg);
                opacity: 0.4;
            }
            66% {
                transform: translate(-5%, 5%) scale(0.9) rotate(-5deg);
                opacity: 0.3;
            }
            100% {
                transform: translate(3%, -3%) scale(1.05) rotate(3deg);
                opacity: 0.4;
            }
        }
        
        /* حركة النيون */
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .animate-gradient {
            animation: gradient 3s ease infinite;
            background-size: 200% auto;
        }
        
        @keyframes pulse-slow {
            0%, 100% { opacity: 0.1; }
            50% { opacity: 0.3; }
        }
        .animate-pulse-slow {
            animation: pulse-slow 4s ease-in-out infinite;
        }
        .delay-1500 {
            animation-delay: 1.5s;
        }
        
        /* شريط التمرير */
        .custom-scrollbar::-webkit-scrollbar {
            height: 2px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(6, 182, 212, 0.05);
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: linear-gradient(to right, #06b6d4, #d946ef);
            border-radius: 9999px;
        }
        
        ::selection {
            background: #06b6d4;
            color: #0a0a0f;
        }
        
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #0a0a0f;
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #06b6d4, #d946ef);
            border-radius: 9999px;
        }
    </style>
</div>