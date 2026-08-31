<div>
    <!-- ============================================================== -->
    <!-- 🛒 زر السلة -->
    <!-- ============================================================== -->
    <button wire:click="toggleCart" 
            class="relative w-10 h-10 rounded-full border border-[#E4EAE7] bg-white flex items-center justify-center text-[#0F2A1E] hover:border-[#3EB489] hover:shadow-md transition">
        <i class="bi bi-cart3 text-lg"></i>
        @if($totalItems > 0)
            <span class="absolute -top-1 -right-1 w-5 h-5 bg-[#0F2A1E] text-white text-[10px] font-bold rounded-full flex items-center justify-center shadow-sm">
                {{ $totalItems }}
            </span>
        @endif
    </button>

    <!-- ============================================================== -->
    <!-- 🛒 سلة المشتريات (Sidebar) - إصلاح المشكلة -->
    <!-- ============================================================== -->
    @if($isOpen)
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-[#0F2A1E]/50 backdrop-blur-sm z-[9998]" wire:click="closeCart"></div>
        
        <!-- Cart Sidebar -->
        <div class="fixed top-0 left-0 h-full w-full max-w-md bg-white shadow-2xl z-[9999] overflow-y-auto">
            
            <!-- Header -->
            <div class="sticky top-0 bg-white border-b border-[#E4EAE7] p-4 flex items-center justify-between z-10">
                <h2 class="text-xl font-bold text-[#0F2A1E] flex items-center gap-2">
                    <i class="bi bi-cart3 text-[#3EB489]"></i>
                    سلة المشتريات
                    @if($totalItems > 0)
                        <span class="text-sm font-normal text-[#7C8C85]">({{ $totalItems }} عناصر)</span>
                    @endif
                </h2>
                <button wire:click="closeCart" class="p-2 hover:bg-[#F2F5F3] rounded-lg transition text-[#7C8C85] hover:text-[#0F2A1E]">
                    <i class="bi bi-x-lg text-xl"></i>
                </button>
            </div>

            <!-- الإشعارات -->
            @if (session()->has('cart_success'))
                <div class="m-4 p-3 bg-[#EAF5EF] border border-[#CFE9DC] rounded-xl text-[#1E8A63] text-sm flex items-center gap-2">
                    <i class="bi bi-check-circle-fill text-[#3EB489]"></i>
                    <span>{{ session('cart_success') }}</span>
                </div>
            @endif
            
            @if (session()->has('cart_error'))
                <div class="m-4 p-3 bg-[#FBEAE8] border border-[#F1C7C1] rounded-xl text-[#C0392B] text-sm flex items-center gap-2">
                    <i class="bi bi-exclamation-circle-fill text-[#C0392B]"></i>
                    <span>{{ session('cart_error') }}</span>
                </div>
            @endif

            <!-- عناصر السلة -->
            @if(empty($cart))
                <div class="flex flex-col items-center justify-center py-16 px-4 text-center">
                    <div class="w-32 h-32 rounded-full bg-[#F2F5F3] flex items-center justify-center mb-6">
                        <i class="bi bi-cart-x text-6xl text-[#C7D3CD]"></i>
                    </div>
                    <h3 class="text-lg font-bold text-[#0F2A1E]">سلتك فارغة</h3>
                    <p class="text-sm text-[#7C8C85] mt-1">ابدأ بإضافة المنتجات إلى سلة التسوق</p>
                    <button wire:click="closeCart" class="mt-6 px-6 py-2.5 bg-[#0F2A1E] text-white font-bold rounded-xl hover:bg-[#173F2C] transition">
                        <i class="bi bi-arrow-right"></i> تصفح المنتجات
                    </button>
                </div>
            @else
                <!-- قائمة العناصر -->
                <div class="p-4 space-y-3">
                    @foreach($cart as $item)
                        <div class="flex items-center gap-3 bg-[#F7F8F6] rounded-xl p-3 border border-[#E4EAE7] hover:border-[#3EB489]/30 transition">
                            <!-- الصورة -->
                            <div class="w-16 h-16 rounded-lg bg-[#F2F5F3] overflow-hidden flex-shrink-0 flex items-center justify-center">
                                @if(isset($item['image']) && $item['image'])
                                    <img src="{{ asset('storage/' . $item['image']) }}" 
                                         class="w-full h-full object-cover"
                                         alt="{{ $item['name'] }}">
                                @else
                                    <i class="bi bi-hdd-stack text-3xl text-[#C7D3CD]"></i>
                                @endif
                            </div>
                            
                            <!-- المعلومات -->
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-bold text-[#0F2A1E] truncate">{{ $item['name'] }}</h4>
                                <p class="text-sm font-bold text-[#0F2A1E]">
                                    {{ number_format($item['price']) }}
                                    <span class="text-[10px] font-normal text-[#7C8C85]">ج.م</span>
                                </p>
                            </div>
                            
                            <!-- أدوات التحكم بالكمية -->
                            <div class="flex items-center gap-1 bg-white border border-[#E4EAE7] rounded-lg px-1 py-0.5">
                                <button wire:click="decrementQuantity({{ $item['id'] }})" 
                                    class="w-7 h-7 flex items-center justify-center rounded-lg text-[#7C8C85] hover:bg-[#F2F5F3] hover:text-[#0F2A1E] transition text-sm font-bold">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <span class="w-6 text-center text-xs font-bold text-[#0F2A1E]">{{ $item['quantity'] }}</span>
                                <button wire:click="incrementQuantity({{ $item['id'] }})" 
                                    class="w-7 h-7 flex items-center justify-center rounded-lg text-[#7C8C85] hover:bg-[#F2F5F3] hover:text-[#0F2A1E] transition text-sm font-bold">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                            
                            <!-- حذف -->
                            <button wire:click="removeFromCart({{ $item['id'] }})" 
                                class="p-1.5 text-[#C7D3CD] hover:text-[#C0392B] hover:bg-[#FBEAE8] rounded-lg transition">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </div>
                    @endforeach
                </div>

                <!-- Footer -->
                <div class="sticky bottom-0 bg-white border-t border-[#E4EAE7] p-4 space-y-4">
                    <!-- الإجمالي -->
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-[#7C8C85]">الإجمالي</span>
                        <span class="text-2xl font-black text-[#0F2A1E]">
                            {{ number_format($totalPrice) }}
                            <span class="text-sm font-normal text-[#7C8C85]">ج.م</span>
                        </span>
                    </div>

                    <!-- عنوان الشحن -->
                    <div>
                        <label class="text-xs font-bold text-[#7C8C85] flex items-center gap-1">
                            <i class="bi bi-geo-alt"></i> عنوان الشحن
                            <span class="text-[#C0392B]">*</span>
                        </label>
                        <input type="text" wire:model="shippingAddress" 
                               class="w-full mt-1 px-4 py-2.5 bg-[#F7F8F6] border border-[#E4EAE7] rounded-xl text-sm text-[#0F2A1E] placeholder-[#A2B0AA] focus:border-[#3EB489] focus:ring-2 focus:ring-[#3EB489]/20 transition outline-none"
                               placeholder="أدخل عنوان التوصيل...">
                        @error('shippingAddress')
                            <p class="text-xs text-[#C0392B] mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- ملاحظات -->
                    <div>
                        <label class="text-xs font-bold text-[#7C8C85] flex items-center gap-1">
                            <i class="bi bi-pencil"></i> ملاحظات إضافية
                        </label>
                        <textarea wire:model="notes" rows="2" 
                                  class="w-full mt-1 px-4 py-2.5 bg-[#F7F8F6] border border-[#E4EAE7] rounded-xl text-sm text-[#0F2A1E] placeholder-[#A2B0AA] focus:border-[#3EB489] focus:ring-2 focus:ring-[#3EB489]/20 transition outline-none resize-none"
                                  placeholder="أي ملاحظات للطلب..."></textarea>
                    </div>

                    <!-- الأزرار -->
                    <div class="flex gap-3">
                        <button wire:click="checkout" 
                                class="flex-1 py-3 bg-[#0F2A1E] text-white font-bold rounded-xl hover:bg-[#173F2C] transition shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                            <i class="bi bi-check-lg"></i> تأكيد الحجز
                        </button>
                        <button wire:click="clearCart" 
                                class="px-4 py-3 border border-[#E4EAE7] text-[#7C8C85] font-bold rounded-xl hover:border-[#C0392B] hover:text-[#C0392B] hover:bg-[#FBEAE8] transition">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    @endif

    <!-- ============================================================== -->
    <!-- 🎨 التنسيقات -->
    <!-- ============================================================== -->
    <style>
        /* ✅ إصلاح مشكلة ظهور السلة */
        .fixed.top-0.left-0.h-full {
            max-width: 400px;
            width: 100%;
            height: 100vh !important;
            max-height: 100vh !important;
            overflow-y: auto !important;
            display: flex;
            flex-direction: column;
        }
        
        .fixed.top-0.left-0.h-full > * {
            flex-shrink: 0;
        }
        
        .fixed.top-0.left-0.h-full .space-y-3 {
            flex: 1;
            overflow-y: auto;
        }
        
        .fixed.top-0.left-0.h-full .sticky.bottom-0 {
            flex-shrink: 0;
        }
        
        @keyframes slideIn {
            from {
                transform: translateX(-100%);
            }
            to {
                transform: translateX(0);
            }
        }
        
        .fixed.top-0.left-0.h-full {
            animation: slideIn 0.3s ease-out;
        }
    </style>
</div>