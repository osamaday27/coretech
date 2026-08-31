<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Core Tech</title>
    <script src="https://tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-white min-h-screen p-6 font-sans">

    <!-- شريط التنقل العلوي -->
    <header class="max-w-6xl mx-auto flex justify-between items-center border-b border-slate-900 pb-5 mb-8">
        <a href="{{ route('shop.home') }}" class="text-xs bg-slate-900 border border-slate-800 px-4 py-2 rounded-xl text-cyan-400 hover:border-cyan-500 transition">
            ⬅️ العودة للمتجر الرئيسي
        </a>
        <h1 class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">CORE TECH</h1>
    </header>

    <!-- الهيكل الرئيسي للتفاصيل -->
    <main class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 bg-slate-900/20 border border-slate-900 rounded-3xl p-6 backdrop-blur">
        
        <!-- الجانب الأيمن: معرض صور قطعة الهاردوير -->
        <div class="space-y-4">
            <div class="w-full h-80 bg-slate-950 rounded-2xl border border-slate-800 flex items-center justify-center overflow-hidden">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="object-cover h-full w-full">
                @else
                    <svg class="w-20 h-20 text-slate-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                @endif
            </div>

            <!-- ألبوم الصور الإضافية (Gallery) إذا قمت برفع صور في Filament -->
            @if($product->gallery)
                <div class="grid grid-cols-4 gap-2">
                    @foreach($product->gallery as $subImage)
                        <div class="h-20 bg-slate-950 rounded-xl border border-slate-800 overflow-hidden cursor-pointer hover:border-cyan-400 transition">
                            <img src="{{ asset('storage/' . $subImage) }}" class="object-cover h-full w-full">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- الجانب الأيسر: البيانات والمواصفات الفنية وزر الشراء -->
        <div class="flex flex-col justify-between">
            <div class="space-y-4">
                <span class="text-xs font-black tracking-widest bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 px-3 py-1 rounded-full uppercase">
                    {{ $product->category->name }}
                </span>
                
                <h2 class="text-3xl font-black text-white leading-tight">{{ $product->name }}</h2>
                
                <div class="text-slate-400 text-sm leading-relaxed whitespace-pre-line border-t border-slate-900 pt-4">
                    <h4 class="text-white font-bold mb-2">🚀 المواصفات الفنية للقطعة:</h4>
                    {!! $product->description ?? 'لا توجد تفاصيل إضافية مسجلة لهذه القطعة حالياً.' !!}
                </div>
            </div>

            <!-- كارت السعر والتوفر والتوجيه -->
            <div class="mt-8 bg-slate-950/60 border border-slate-900 p-5 rounded-2xl flex justify-between items-center">
                <div class="flex flex-col">
                    <span class="text-[10px] text-slate-500 font-bold uppercase">السعر الرسمي شامل الضريبة</span>
                    <span class="text-3xl font-black text-amber-400 tracking-tight">
                        {{ number_format($product->price) }} <span class="text-sm font-normal text-slate-400">EGP</span>
                    </span>
                </div>

                <div>
                    @if($product->stock > 0)
                        <!-- بما أن السلة تعمل بـ Livewire في الصفحة الرئيسية، يتم توجيه العميل للصفحة الرئيسية لإضافته فوراً -->
                        <a href="{{ route('shop.home') }}" class="inline-block bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-slate-950 font-black px-6 py-3 rounded-xl text-sm transition-all shadow-xl shadow-cyan-500/10">
                            اطلب القطعة الآن 🛒
                        </a>
                    @else
                        <span class="text-xs text-red-400 font-black bg-red-500/5 border border-red-500/10 px-4 py-2 rounded-xl">غير متوفر بالمخزن حالياً</span>
                    @endif
                </div>
            </div>
        </div>

    </main>

    <footer class="max-w-6xl mx-auto text-center text-xs text-slate-600 mt-12 border-t border-slate-900/60 pt-4">
        &copy; 2026 Core Tech Systems & Hardware. جميع الحقوق محفوظة.
    </footer>

</body>
</html>
