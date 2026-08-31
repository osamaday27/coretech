<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ShopComponent extends Component
{
    public $cart = [];
    public $totalPrice = 0;
    public $shippingAddress = '';
    public $notes = '';
    public $selectedCategory = null;
    public $products = [];
    public $categories = [];

    public function mount()
    {
        $this->loadCart();
        $this->loadCategories();
        $this->loadProducts();
    }

    public function loadCategories()
    {
        $this->categories = Category::where('is_visible', true)
            ->orderBy('name')
            ->get();
    }

    public function loadProducts()
    {
        $productQuery = Product::where('is_active', true);
        
        if ($this->selectedCategory) {
            $productQuery->where('category_id', $this->selectedCategory);
        }

        $this->products = $productQuery->with('category')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function loadCart()
    {
        $this->cart = session()->get('coretech_cart', []);
        $this->calculateTotal();
    }

    public function filterCategory($categoryId = null)
    {
        $this->selectedCategory = $categoryId;
        $this->loadProducts();
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);
        
        if (!$product || !$product->is_active || $product->stock <= 0) {
            session()->flash('error', 'عذراً، هذا المنتج غير متوفر حالياً!');
            return;
        }

        if (isset($this->cart[$productId])) {
            if ($this->cart[$productId]['quantity'] < $product->stock) {
                $this->cart[$productId]['quantity']++;
                session()->flash('success', 'تم زيادة كمية ' . $product->name);
            } else {
                session()->flash('error', 'لقد تجاوزت الحد الأقصى للمخزون!');
                return;
            }
        } else {
            $this->cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
            session()->flash('success', 'تم إضافة ' . $product->name . ' إلى السلة');
        }

        $this->syncSession();
    }

    public function incrementQuantity($productId)
    {
        $product = Product::find($productId);
        if (isset($this->cart[$productId]) && $this->cart[$productId]['quantity'] < $product->stock) {
            $this->cart[$productId]['quantity']++;
            $this->syncSession();
            session()->flash('success', 'تم زيادة الكمية');
        } else {
            session()->flash('error', 'لا يمكن إضافة المزيد، تم الوصول لحد المخزون الأقصى!');
        }
    }

    public function decrementQuantity($productId)
    {
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity']--;
            if ($this->cart[$productId]['quantity'] <= 0) {
                unset($this->cart[$productId]);
                session()->flash('success', 'تم إزالة المنتج من السلة');
            } else {
                session()->flash('success', 'تم إنقاص الكمية');
            }
            $this->syncSession();
        }
    }

    public function removeFromCart($productId)
    {
        if (isset($this->cart[$productId])) {
            $productName = $this->cart[$productId]['name'];
            unset($this->cart[$productId]);
            $this->syncSession();
            session()->flash('success', 'تم إزالة ' . $productName . ' من السلة');
        }
    }

    public function clearCart()
    {
        $this->cart = [];
        $this->syncSession();
        session()->flash('success', 'تم تفريغ السلة بالكامل');
    }

    public function calculateTotal()
    {
        $this->totalPrice = 0;
        foreach ($this->cart as $item) {
            $this->totalPrice += $item['price'] * $item['quantity'];
        }
        return $this->totalPrice;
    }

    private function syncSession()
    {
        session()->put('coretech_cart', $this->cart);
        $this->calculateTotal();
        $this->dispatch('cartUpdated');
    }

    public function checkout()
    {
        if (!Auth::check()) {
            session()->flash('error', 'يرجى تسجيل الدخول أولاً لإتمام الطلب');
            return redirect()->route('login');
        }

        if (empty($this->cart)) {
            session()->flash('error', 'سلتك فارغة! قم بإضافة منتجات أولاً.');
            return;
        }

        $this->validate([
            'shippingAddress' => 'required|string|min:10|max:500',
        ], [
            'shippingAddress.required' => 'عنوان الشحن مطلوب',
            'shippingAddress.min' => 'عنوان الشحن يجب أن لا يقل عن 10 أحرف',
        ]);

        foreach ($this->cart as $item) {
            $product = Product::find($item['id']);
            if (!$product || !$product->is_active || $product->stock < $item['quantity']) {
                session()->flash('error', 'بعض المنتجات غير متوفرة حالياً. يرجى تحديث السلة.');
                return;
            }
        }

        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => 'CT-' . strtoupper(uniqid()) . '-' . date('Ymd'),
                'total_price' => $this->totalPrice,
                'status' => 'pending',
                'payment_method' => 'cash',
                'payment_status' => 'pending',
                'shipping_address' => $this->shippingAddress,
                'notes' => $this->notes,
            ]);

            foreach ($this->cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);

                $product = Product::find($item['id']);
                $product->decrement('stock', $item['quantity']);
            }

            DB::commit();

            $this->cart = [];
            session()->forget('coretech_cart');
            $this->totalPrice = 0;
            $this->shippingAddress = '';
            $this->notes = '';

            session()->flash('success', 'تم تسجيل طلب الشراء بنجاح! 🎉 كود التتبع: ' . $order->order_number);

        } catch (\Exception $e) {
            DB::rollBack();
            
            Log::error('Checkout error: ', [
                'user_id' => Auth::id() ?? 'guest',
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'cart' => $this->cart
            ]);
            
            session()->flash('error', 'حدث خطأ أثناء معالجة طلبك. يرجى المحاولة مرة أخرى.');
        }
    }

   public function render()
{
    return view('livewire.shop-component', [
        'products' => $this->products,
        'categories' => $this->categories,
    ])->layout('layouts.app'); // ✅ حدد الـ Layout هنا
}
}