<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 text-white">
        
        <!-- تأثيرات خلفية -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute top-60 -left-40 w-80 h-80 bg-blue-600/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
            <div class="absolute bottom-20 left-1/2 w-72 h-72 bg-purple-500/5 rounded-full blur-3xl animate-pulse delay-2000"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 md:px-8 py-6 md:py-10">
            
            <!-- ===== لوحة الترحيب ===== -->
            <div class="relative bg-slate-900/60 backdrop-blur-2xl border border-slate-800/60 rounded-3xl p-6 mb-8 shadow-2xl shadow-cyan-500/5 hover:shadow-cyan-500/10 transition-shadow duration-500">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <div>
                        <h2 class="text-2xl md:text-3xl font-black">
                            <span class="bg-gradient-to-r from-cyan-400 via-teal-300 to-blue-500 bg-clip-text text-transparent">
                                مركز تتبع الطلبات
                            </span>
                        </h2>
                        <p class="text-sm text-slate-400 mt-1">
                            👋 أهلاً بك يا هندسة، هنا يمكنك مراجعة حالة تجميعات الـ PC وقطع الهاردوير الخاصة بك.
                        </p>
                    </div>
                    <a href="{{ route('shop.home') }}" 
                       class="relative px-6 py-2.5 text-xs font-bold rounded-xl bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-slate-950 shadow-lg shadow-cyan-500/30 hover:shadow-cyan-500/50 transition-all duration-300 hover:scale-105 whitespace-nowrap">
                        🛒 تسوق قطع جديدة
                    </a>
                </div>
                <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-cyan-500/50 to-transparent"></div>
            </div>

            <!-- ===== إحصائيات سريعة ===== -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                @php
                    $totalOrders = \App\Models\Order::where('user_id', auth()->id())->count();
                    $pendingOrders = \App\Models\Order::where('user_id', auth()->id())->where('status', 'pending')->count();
                    $completedOrders = \App\Models\Order::where('user_id', auth()->id())->where('status', 'completed')->count();
                    $totalSpent = \App\Models\Order::where('user_id', auth()->id())->where('status', 'completed')->sum('total_price');
                @endphp

                <div class="bg-slate-900/40 backdrop-blur-xl border border-slate-800/50 rounded-2xl p-5 shadow-xl hover:border-cyan-500/30 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-slate-400 font-bold uppercase tracking-wider">إجمالي الطلبات</span>
                        <span class="text-cyan-400">📦</span>
                    </div>
                    <p class="text-3xl font-black text-white mt-2">{{ $totalOrders }}</p>
                </div>

                <div class="bg-slate-900/40 backdrop-blur-xl border border-slate-800/50 rounded-2xl p-5 shadow-xl hover:border-amber-500/30 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-slate-400 font-bold uppercase tracking-wider">قيد الانتظار</span>
                        <span class="text-amber-400">⏳</span>
                    </div>
                    <p class="text-3xl font-black text-white mt-2">{{ $pendingOrders }}</p>
                </div>

                <div class="bg-slate-900/40 backdrop-blur-xl border border-slate-800/50 rounded-2xl p-5 shadow-xl hover:border-emerald-500/30 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-slate-400 font-bold uppercase tracking-wider">مكتملة</span>
                        <span class="text-emerald-400">✅</span>
                    </div>
                    <p class="text-3xl font-black text-white mt-2">{{ $completedOrders }}</p>
                </div>

                <div class="bg-slate-900/40 backdrop-blur-xl border border-slate-800/50 rounded-2xl p-5 shadow-xl hover:border-yellow-500/30 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-slate-400 font-bold uppercase tracking-wider">إجمالي المشتريات</span>
                        <span class="text-yellow-400">💰</span>
                    </div>
                    <p class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-yellow-500 mt-2">{{ number_format($totalSpent) }} ج.م</p>
                </div>
            </div>

            <!-- ===== جدول الفواتير ===== -->
            <div class="bg-slate-900/40 backdrop-blur-xl border border-slate-800/50 rounded-2xl p-6 shadow-2xl shadow-cyan-500/5">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold flex items-center gap-2 text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-400">
                        <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                        📋 سجل مشترياتك السابقة
                    </h3>
                    <span class="text-xs text-slate-500 bg-slate-800/50 px-3 py-1 rounded-full border border-slate-700/50">
                        {{ $totalOrders }} طلب
                    </span>
                </div>

                @php
                    $userOrders = \App\Models\Order::where('user_id', auth()->id())->latest()->get();
                @endphp

                @if($userOrders->isEmpty())
                    <div class="flex flex-col items-center justify-center py-16 text-center">
                        <div class="w-24 h-24 rounded-full bg-slate-800/50 flex items-center justify-center mb-6">
                            <svg class="w-12 h-12 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <p class="text-slate-400 font-medium">لا توجد طلبات</p>
                        <p class="text-slate-600 text-sm mt-1">لم تقم بتقديم أي طلبات شراء حتى الآن</p>
                        <a href="{{ route('shop.home') }}" class="mt-4 px-6 py-2.5 text-xs font-bold rounded-xl bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-slate-950 shadow-lg shadow-cyan-500/30 transition-all duration-300 hover:scale-105">
                            🛒 ابدأ التسوق الآن
                        </a>
                    </div>
                @else
                    <div class="overflow-x-auto rounded-xl border border-slate-800/50">
                        <table class="w-full text-right text-sm">
                            <thead class="bg-slate-950/80 text-slate-400 font-bold border-b border-slate-800/50">
                                <tr>
                                    <th class="p-4 text-center">#</th>
                                    <th class="p-4">رقم الفاتورة</th>
                                    <th class="p-4">التاريخ</th>
                                    <th class="p-4">عنوان التوصيل</th>
                                    <th class="p-4">الإجمالي</th>
                                    <th class="p-4 text-center">حالة الطلب</th>
                                    <th class="p-4 text-center">الدفع</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-800/30">
                                @foreach($userOrders as $index => $order)
                                    <tr class="hover:bg-slate-800/30 transition-all duration-200 group">
                                        <td class="p-4 text-center text-slate-500 text-xs">{{ $loop->iteration }}</td>
                                        <td class="p-4 font-mono font-bold text-cyan-400 text-xs">{{ $order->order_number }}</td>
                                        <td class="p-4 text-slate-400 text-xs">{{ $order->created_at->format('Y-m-d') }}</td>
                                        <td class="p-4 text-slate-300 max-w-[150px] truncate text-xs">{{ $order->shipping_address }}</td>
                                        <td class="p-4 font-black text-amber-400">{{ number_format($order->total_price) }} <span class="text-[10px] text-slate-400">ج.م</span></td>
                                        
                                        <!-- حالة الطلب -->
                                        <td class="p-4 text-center">
                                            <span class="inline-block px-3 py-1 text-[10px] font-bold rounded-full
                                                @if($order->status == 'pending') bg-slate-800/80 text-slate-400 border border-slate-700/50
                                                @elseif($order->status == 'processing') bg-amber-500/10 text-amber-400 border border-amber-500/20
                                                @elseif($order->status == 'shipped') bg-blue-500/10 text-blue-400 border border-blue-500/20
                                                @elseif($order->status == 'completed') bg-emerald-500/10 text-emerald-400 border border-emerald-500/20
                                                @else bg-red-500/10 text-red-400 border border-red-500/20
                                                @endif">
                                                @if($order->status == 'pending') ⏳ قيد الانتظار
                                                @elseif($order->status == 'processing') 🔧 جاري التجهيز
                                                @elseif($order->status == 'shipped') 🚚 تم الشحن
                                                @elseif($order->status == 'completed') ✅ مكتمل
                                                @else ❌ ملغي
                                                @endif
                                            </span>
                                        </td>

                                        <!-- حالة الدفع -->
                                        <td class="p-4 text-center">
                                            <span class="text-xs font-bold px-3 py-1 rounded-full
                                                @if($order->payment_status == 'paid') bg-emerald-500/10 text-emerald-400 border border-emerald-500/20
                                                @else bg-amber-500/10 text-amber-400 border border-amber-500/20
                                                @endif">
                                                {{ $order->payment_status == 'paid' ? '✅ مدفوع' : '⏳ عند الاستلام' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>