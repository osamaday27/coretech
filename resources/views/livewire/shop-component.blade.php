<div class="min-h-screen bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 text-white font-sans antialiased">
    
    <!-- ========== HEADER BAR MODULE ========== -->
    <header class="relative z-10 backdrop-blur-xl bg-slate-900/40 border-b border-slate-800/50 shadow-2xl shadow-cyan-500/5">
        <div class="max-w-7xl mx-auto px-6 py-4 flex flex-wrap items-center justify-between gap-4">
            <!-- Brand -->
            <div class="flex items-center gap-4">
                <div class="relative">
                    <div class="w-3 h-3 rounded-full bg-cyan-400 animate-ping absolute"></div>
                    <div class="w-3 h-3 rounded-full bg-cyan-400 relative"></div>
                </div>
                <h1 class="text-2xl md:text-3xl font-black tracking-tight">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-blue-400 to-purple-400">
                        CORE TECH
                    </span>
                    <span class="text-amber-400 text-[10px] md:text-xs font-bold px-3 py-1 bg-amber-400/10 rounded-full border border-amber-400/20 ml-2 align-middle">
                        STORE
                    </span>
                </h1>
            </div>
            
            <!-- User Actions -->
            <div class="flex items-center gap-3 md:gap-4">
                <span class="hidden sm:inline text-sm text-slate-400">
                    مرحباً: 
                    <strong class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-400">
                        {{ auth()->user()->name ?? 'زائرنا الكريم' }}
                    </strong>
                </span>
                @auth
                    <a href="/admin" class="group relative px-4 py-2 text-xs font-bold rounded-xl overflow-hidden transition-all duration-300 hover:scale-105">
                        <span class="absolute inset-0 bg-slate-800/50 border border-slate-700/50 rounded-xl group-hover:border-cyan-500/50 transition-colors"></span>
                        <span class="relative flex items-center gap-2 text-slate-300 group-hover:text-cyan-400 transition-colors">
                            لوحة التحكم
                            <svg class="w-4 h-4 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </span>
                    </a>
                @else
                    <a href="/login" class="relative px-6 py-2.5 text-xs font-bold rounded-xl bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-slate-950 shadow-lg shadow-cyan-500/25 hover:shadow-cyan-500/40 transition-all duration-300 hover:scale-105">
                        تسجيل الدخول
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-8">
        
        <!-- ========== NOTIFICATIONS ========== -->
        @if (session()->has('success'))
            <div class="relative mb-8 overflow-hidden rounded-2xl bg-gradient-to-r from-emerald-500/10 via-emerald-500/5 to-transparent border border-emerald-500/20 backdrop-blur-sm animate-slideDown">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/5 to-transparent"></div>
                <div class="relative p-5 flex items-center gap-4">
                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-emerald-500/20 flex items-center justify-center">
                        <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-emerald-400 text-sm">🎉 نجاح!</p>
                        <p class="text-emerald-300/80 text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif
        
        @if (session()->has('error'))
            <div class="relative mb-8 overflow-hidden rounded-2xl bg-gradient-to-r from-red-500/10 via-red-500/5 to-transparent border border-red-500/20 backdrop-blur-sm animate-slideDown">
                <div class="relative p-5 flex items-center gap-4">
                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-red-500/20 flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-red-400 text-sm">⚠️ خطأ</p>
                        <p class="text-red-300/80 text-sm">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- ========== CATEGORY FILTER ========== -->
        <div class="mb-10">
            <div class="flex items-center gap-2 overflow-x-auto pb-3 scrollbar-thin scrollbar-thumb-slate-700 scrollbar-track-transparent">
                <button wire:click="filterCategory(null)" 
                    class="group relative px-5 py-2.5 rounded-2xl text-xs font-bold transition-all duration-300 shrink-0
                    {{ is_null($selectedCategory) 
                        ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-slate-950 shadow-lg shadow-cyan-500/30 scale-105' 
                        : 'bg-slate-800/50 border border-slate-700/50 text-slate-400 hover:border-slate-600 hover:text-white hover:scale-105' 
                    }}">
                    <span class="relative z-10 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                        جميع القطع
                    </span>
                </button>
                @foreach($categories as $category)
                    <button wire:click="filterCategory({{ $category->id }})" 
                        class="group relative px-5 py-2.5 rounded-2xl text-xs font-bold transition-all duration-300 shrink-0
                        {{ $selectedCategory == $category->id 
                            ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-slate-950 shadow-lg shadow-cyan-500/30 scale-105' 
                            : 'bg-slate-800/50 border border-slate-700/50 text-slate-400 hover:border-slate-600 hover:text-white hover:scale-105' 
                        }}">
                        <span class="relative z-10">{{ $category->name }}</span>
                    </button>
                @endforeach
            </div>
        </div>

        <!-- ========== MAIN GRID ========== -->
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-8">
            
            <!-- ===== LEFT: PRODUCTS ===== -->
            <div class="xl:col-span-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse($products as $product)
                        <div class="group relative bg-gradient-to-br from-slate-900/80 to-slate-900/40 backdrop-blur-sm border border-slate-800/50 rounded-2xl p-5 hover:border-cyan-500/40 transition-all duration-500 hover:shadow-2xl hover:shadow-cyan-500/5 hover:-translate-y-2">
                            <!-- Glow Effect -->
                            <div class="absolute -top-24 -right-24 w-48 h-48 bg-cyan-500/5 rounded-full blur-3xl group-hover:bg-cyan-500/10 transition-all duration-700"></div>
                            <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-purple-500/5 rounded-full blur-3xl group-hover:bg-purple-500/10 transition-all duration-700"></div>
                            
                            <!-- Image -->
                            <div class="relative w-full h-48 bg-slate-950/80 rounded-xl mb-4 overflow-hidden border border-slate-800 group-hover:border-slate-700 transition-all duration-300">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-16 h-16 text-slate-700 group-hover:text-cyan-500/20 transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif
                                <!-- Stock Badge -->
                                @if($product->stock > 0)
                                    <span class="absolute top-2 right-2 px-2.5 py-1 text-[9px] font-black uppercase bg-emerald-500/20 text-emerald-400 rounded-lg border border-emerald-500/20 backdrop-blur-sm">
                                        متوفر
                                    </span>
                                @else
                                    <span class="absolute top-2 right-2 px-2.5 py-1 text-[9px] font-black uppercase bg-red-500/20 text-red-400 rounded-lg border border-red-500/20 backdrop-blur-sm">
                                        نفذ
                                    </span>
                                @endif
                            </div>
                            
                            <!-- Category Badge -->
                            <span class="inline-block text-[10px] font-black tracking-wider uppercase px-3 py-1 bg-slate-800/80 text-cyan-400 rounded-lg border border-slate-700/50">
                                {{ $product->category->name }}
                            </span>
                            
                            <!-- Title -->
                            <h3 class="text-xl font-bold mt-3 text-white group-hover:text-cyan-400 transition-colors duration-300">
                                {{ $product->name }}
                            </h3>
                            
                            <!-- Description -->
                            <p class="text-xs text-slate-400 mt-2 line-clamp-2 leading-relaxed">
                                {{ $product->description }}
                            </p>
                            
                            <!-- Footer -->
                            <div class="mt-5 flex items-center justify-between pt-4 border-t border-slate-800/50">
                                <div>
                                    <span class="text-[9px] uppercase tracking-widest text-slate-500 font-bold">السعر</span>
                                    <div class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-yellow-500">
                                        {{ number_format($product->price) }}
                                        <span class="text-xs font-medium text-slate-400">EGP</span>
                                    </div>
                                </div>
                                
                                @if($product->stock > 0)
                                    <button wire:click="addToCart({{ $product->id }})" 
                                        class="relative px-5 py-2.5 rounded-xl text-xs font-black text-slate-950 overflow-hidden group/btn transition-all duration-300 hover:scale-105">
                                        <span class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-blue-600 group-hover/btn:from-cyan-400 group-hover/btn:to-blue-500 transition-all duration-300"></span>
                                        <span class="relative z-10 flex items-center gap-2">
                                            إضافة
                                            <svg class="w-4 h-4 group-hover/btn:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                            </svg>
                                        </span>
                                    </button>
                                @else
                                    <span class="text-xs text-red-400 font-bold bg-red-500/10 border border-red-500/20 px-4 py-2 rounded-xl">
                                        نفذ من المخزن
                                    </span>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-span-2 flex flex-col items-center justify-center py-16 text-center">
                            <div class="w-24 h-24 rounded-full bg-slate-800/50 flex items-center justify-center mb-4">
                                <svg class="w-12 h-12 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <p class="text-slate-400 text-sm font-medium">لا توجد قطع هاردوير متاحة</p>
                            <p class="text-slate-600 text-xs">حاول تغيير التصنيف المحدد</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- ===== RIGHT: CART ===== -->
            <div class="xl:col-span-4">
                <div class="sticky top-8 bg-gradient-to-br from-slate-900/80 to-slate-900/40 backdrop-blur-sm border border-slate-800/50 rounded-2xl p-6 shadow-2xl shadow-cyan-500/5">
                    <!-- Cart Header -->
                    <div class="flex items-center justify-between pb-4 mb-5 border-b border-slate-800/50">
                        <h2 class="text-lg font-black flex items-center gap-2 text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-400">
                            <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            سلة التجميعة
                        </h2>
                        <span class="text-[10px] font-bold px-3 py-1 rounded-full bg-cyan-500/10 text-cyan-400 border border-cyan-500/20">
                            {{ count($cart) }} عنصر
                        </span>
                    </div>

                    @if(empty($cart))
                        <div class="flex flex-col items-center py-12 text-center">
                            <div class="w-20 h-20 rounded-full bg-slate-800/50 flex items-center justify-center mb-4">
                                <svg class="w-10 h-10 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                </svg>
                            </div>
                            <p class="text-slate-500 text-sm font-medium">سلة المشتريات فارغة</p>
                            <p class="text-slate-600 text-xs">تصفح المعروضات لتسوق أول قطعة!</p>
                        </div>
                    @else
                        <!-- Cart Items -->
                        <div class="space-y-3 max-h-80 overflow-y-auto pr-1 custom-scrollbar">
                            @foreach($cart as $item)
                                <div class="group relative bg-slate-800/30 border border-slate-700/30 rounded-xl p-3 hover:border-slate-600/50 transition-all duration-300">
                                    <div class="flex items-center justify-between gap-3">
                                        <!-- Info -->
                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-sm font-bold text-white truncate">{{ $item['name'] }}</h4>
                                            <span class="text-xs font-bold text-amber-400">
                                                {{ number_format($item['price']) }} EGP
                                            </span>
                                        </div>
                                        
                                        <!-- Quantity Controls -->
                                        <div class="flex items-center gap-1 bg-slate-950/80 border border-slate-700/50 rounded-lg px-1 py-0.5">
                                            <button wire:click="decrementQuantity({{ $item['id'] }})" 
                                                class="w-7 h-7 flex items-center justify-center rounded-lg text-slate-400 hover:text-red-400 hover:bg-red-500/10 transition-colors text-sm font-bold">
                                                −
                                            </button>
                                            <span class="w-6 text-center text-xs font-black text-cyan-400">
                                                {{ $item['quantity'] }}
                                            </span>
                                            <button wire:click="incrementQuantity({{ $item['id'] }})" 
                                                class="w-7 h-7 flex items-center justify-center rounded-lg text-slate-400 hover:text-emerald-400 hover:bg-emerald-500/10 transition-colors text-sm font-bold">
                                                +
                                            </button>
                                        </div>
                                        
                                        <!-- Remove -->
                                        <button wire:click="removeFromCart({{ $item['id'] }})" 
                                            class="flex-shrink-0 p-1 rounded-lg text-slate-600 hover:text-red-400 hover:bg-red-500/10 transition-all duration-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Totals -->
                        <div class="mt-5 pt-4 border-t border-slate-800/50 space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-slate-400">الإجمالي</span>
                                <span class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-yellow-500">
                                    {{ number_format($totalPrice) }} EGP
                                </span>
                            </div>

                            <!-- Shipping Address -->
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-400 block">
                                    📍 عنوان الشحن
                                </label>
                                <input type="text" wire:model="shippingAddress" 
                                    class="w-full bg-slate-950/80 border border-slate-700/50 rounded-xl px-4 py-2.5 text-sm text-white placeholder-slate-500 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all duration-300 outline-none"
                                    placeholder="اكتب عنوان التوصيل...">
                                @error('shippingAddress')
                                    <p class="text-xs text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Notes -->
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-400 block">
                                    📝 ملاحظات إضافية
                                </label>
                                <textarea wire:model="notes" rows="2" 
                                    class="w-full bg-slate-950/80 border border-slate-700/50 rounded-xl px-4 py-2.5 text-sm text-white placeholder-slate-500 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all duration-300 outline-none resize-none"
                                    placeholder="أي ملاحظات للطلب..."></textarea>
                            </div>

                            <!-- Checkout Button -->
                            <button wire:click="checkout" 
                                class="relative w-full py-3.5 rounded-xl text-sm font-black text-slate-950 overflow-hidden group/check transition-all duration-300 hover:scale-[1.02]">
                                <span class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-blue-600 group-hover/check:from-cyan-400 group-hover/check:to-blue-500 transition-all duration-300"></span>
                                <span class="relative z-10 flex items-center justify-center gap-3">
                                    تأكيد الحجز
                                    <svg class="w-5 h-5 group-hover/check:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </main>
</div>

<style>
    /* Custom Scrollbar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(71, 85, 105, 0.5);
        border-radius: 9999px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: rgba(71, 85, 105, 0.8);
    }
    
    /* Animations */
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-slideDown {
        animation: slideDown 0.5s ease-out forwards;
    }
</style>