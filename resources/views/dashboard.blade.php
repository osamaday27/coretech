<x-app-layout>
    <div class="py-12 bg-slate-950 min-h-screen text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- لوحة الترحيب العلوية -->
            <div class="bg-slate-900 border border-slate-800 p-6 rounded-2xl shadow-xl flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">مركز تتبع الطلبات والفواتير</h2>
                    <p class="text-xs text-slate-400 mt-1">أهلاً بك يا هندسة، هنا يمكنك مراجعة حالة تجميعات الـ PC وقطع الهاردوير الخاصة بك.</p>
                </div>
                <a href="{{ route('shop.home') }}" class="text-xs bg-cyan-500 text-slate-950 font-black px-4 py-2 rounded-xl hover:bg-cyan-400 transition">
                    تسوق قطع جديدة 🛒
                </a>
            </div>

            <!-- جدول الفواتير التفاعلي -->
            <div class="bg-slate-900/40 border border-slate-900 p-6 rounded-2xl shadow-2xl backdrop-blur">
                <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-amber-400"></span> سجل مشترياتك السابقة
                </h3>

                @php
                    // جلب طلبات العميل الحالي المسجلة في الداتا بيز تلقائياً لتعرض أمامه حية
                    $userOrders = \App\Models\Order::where('user_id', auth()->id())->latest()->get();
                @endphp

                @if($userOrders->isEmpty())
                    <div class="text-center py-12 text-sm text-slate-500 border border-dashed border-slate-800 rounded-xl">
                        لم تقم بتقديم أي طلبات شراء حتى الآن في المتجر.
                    </div>
                @else
                    <div class="overflow-x-auto rounded-xl border border-slate-800/80">
                        <table class="w-full text-right text-sm">
                            <thead class="bg-slate-950 text-slate-400 font-bold border-b border-slate-800">
                                <tr>
                                    <th class="p-4">رقم الفاتورة</th>
                                    <th class="p-4">التاريخ</th>
                                    <th class="p-4">عنوان التوصيل</th>
                                    <th class="p-4">الإجمالي</th>
                                    <th class="p-4 text-center">حالة الطلب</th>
                                    <th class="p-4 text-center">الدفع</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-900">
                                @foreach($userOrders as $order)
                                    <tr class="hover:bg-slate-900/30 transition">
                                        <td class="p-4 font-mono font-bold text-cyan-400">{{ $order->order_number }}</td>
                                        <td class="p-4 text-slate-400 text-xs">{{ $order->created_at->format('Y-m-d') }}</td>
                                        <td class="p-4 text-slate-300 max-w-[200px] truncate text-xs">{{ $order->shipping_address }}</td>
                                        <td class="p-4 font-black text-amber-400">{{ number_format($order->total_price) }} EGP</td>
                                        
                                        <!-- المزامنة اللحظية مع حالات لوحة تحكم الـ Filament -->
                                        <td class="p-4 text-center">
                                            <span class="inline-block px-2.5 py-1 text-xs font-bold rounded-md
                                                @if($order->status == 'pending') bg-slate-800 text-slate-400
                                                @elseif($order->status == 'processing') bg-amber-500/10 text-amber-400 border border-amber-500/20
                                                @elseif($order->status == 'shipped') bg-blue-500/10 text-blue-400 border border-blue-500/20
                                                @elseif($order->status == 'completed') bg-emerald-500/10 text-emerald-400 border border-emerald-500/20
                                                @else bg-red-500/10 text-red-400 border border-red-500/20
                                                @endif">
                                                @if($order->status == 'pending') قيد الانتظار
                                                @elseif($order->status == 'processing') جاري التجهيز وفحص التوافقية
                                                @elseif($order->status == 'shipped') تم التسليم لشركة الشحن
                                                @elseif($order->status == 'completed') تم التوصيل والاعتماد
                                                @else ملغي
                                                @endif
                                            </span>
                                        </td>

                                        <td class="p-4 text-center">
                                            <span class="text-xs font-bold @if($order->payment_status == 'paid') text-emerald-400 @else text-amber-500 @endif">
                                                {{ $order->payment_status == 'paid' ? '✅ تم الدفع' : '⏳ عند الاستلام' }}
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
