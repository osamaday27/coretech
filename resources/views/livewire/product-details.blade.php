@extends('layouts.app')

@section('slot')
<div class="min-h-screen bg-gray-50">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- ===== Breadcrumb ===== -->
        <nav class="flex items-center gap-2 text-sm text-gray-500 mb-6">
            <a href="{{ route('shop.home') }}" class="hover:text-blue-600 transition">🏠 الرئيسية</a>
            <span>/</span>
            <a href="{{ route('shop.home') }}" class="hover:text-blue-600 transition">{{ $product->category->name }}</a>
            <span>/</span>
            <span class="text-gray-900 font-medium">{{ $product->name }}</span>
        </nav>

        <!-- ===== تفاصيل المنتج ===== -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 bg-white border border-gray-200 rounded-2xl p-6 md:p-8 shadow-sm">
            
            <!-- الصور -->
            <div class="space-y-4">
                <div class="relative w-full h-96 bg-gray-100 rounded-2xl border border-gray-200 overflow-hidden">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="w-full h-full object-cover"
                             alt="{{ $product->name }}">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <svg class="w-24 h-24 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    @endif
                    
                    <div class="absolute top-4 right-4">
                        @if($product->stock > 0)
                            <span class="px-3 py-1 text-xs font-bold bg-green-100 text-green-700 rounded-lg">
                                ✅ متوفر
                            </span>
                        @else
                            <span class="px-3 py-1 text-xs font-bold bg-red-100 text-red-700 rounded-lg">
                                ❌ نفذ
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- المعلومات -->
            <div class="flex flex-col justify-between space-y-6">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="text-xs font-bold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                            {{ $product->category->name }}
                        </span>
                        <span class="text-xs text-gray-500">
                            📦 المخزون: {{ $product->stock }} قطعة
                        </span>
                    </div>
                    
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight">
                        {{ $product->name }}
                    </h2>
                    
                    <div class="mt-6 bg-gray-50 border border-gray-200 rounded-xl p-5">
                        <h4 class="text-sm font-bold text-gray-700 flex items-center gap-2 mb-3">
                            🚀 المواصفات الفنية
                        </h4>
                        <div class="text-sm text-gray-600 leading-relaxed whitespace-pre-line">
                            {!! $product->description ?? 'لا توجد تفاصيل إضافية مسجلة لهذه القطعة حالياً.' !!}
                        </div>
                    </div>
                </div>

                <!-- كارت السعر -->
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div>
                            <span class="text-xs text-gray-500 font-bold uppercase tracking-wider">السعر شامل الضريبة</span>
                            <div class="text-3xl md:text-4xl font-bold text-gray-900">
                                {{ number_format($product->price) }}
                                <span class="text-sm font-normal text-gray-500">ج.م</span>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            @if($product->stock > 0)
                                <a href="{{ route('shop.home') }}" 
                                   class="px-8 py-3.5 bg-blue-600 text-white font-bold rounded-lg text-sm hover:bg-blue-700 transition shadow-lg hover:shadow-xl inline-block">
                                    🛒 أضف للسلة
                                </a>
                            @else
                                <span class="text-sm text-red-500 font-bold bg-red-50 border border-red-200 px-6 py-3 rounded-lg inline-block">
                                    ❌ غير متوفر
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- ===== منتجات مشابهة ===== -->
        <div class="mt-12">
            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                🔥 قد يعجبك أيضاً
                <span class="text-sm text-gray-500 font-normal">(منتجات مشابهة)</span>
            </h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $similarProducts = App\Models\Product::where('category_id', $product->category_id)
                        ->where('id', '!=', $product->id)
                        ->where('is_active', true)
                        ->limit(4)
                        ->get();
                @endphp
                
                @forelse($similarProducts as $similar)
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
                        <div class="h-40 bg-gray-100 overflow-hidden">
                            @if($similar->image)
                                <a href="{{ route('shop.product.show', $similar->slug) }}">
                                    <img src="{{ asset('storage/' . $similar->image) }}" 
                                         class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"
                                         alt="{{ $similar->name }}">
                                </a>
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h4 class="text-sm font-bold text-gray-900 truncate">
                                <a href="{{ route('shop.product.show', $similar->slug) }}" class="hover:text-blue-600 transition">
                                    {{ $similar->name }}
                                </a>
                            </h4>
                            <p class="text-sm font-bold text-gray-900 mt-1">
                                {{ number_format($similar->price) }} <span class="text-xs font-normal text-gray-500">ج.م</span>
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm col-span-full text-center">لا توجد منتجات مشابهة</p>
                @endforelse
            </div>
        </div>

    </div>
</div>
@endsection