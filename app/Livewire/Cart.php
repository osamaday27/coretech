<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Cart extends Component
{
    public $cart = [];
    public $totalItems = 0;
    public $totalPrice = 0;
    public $shippingAddress = '';
    public $notes = '';
    public $isOpen = false;

    protected $listeners = [
        'cartUpdated' => 'loadCart',
        'openCart' => 'openCart',
        'closeCart' => 'closeCart',
        'addToCart' => 'addToCart', // إضافة مستمع لإضافة المنتج من أي مكان
    ];

    /**
     * Mount the component
     */
    public function mount()
    {
        $this->loadCart();
    }

    /**
     * Load cart from session
     */
    public function loadCart()
    {
        $this->cart = session()->get('coretech_cart', []);
        $this->calculateTotal();
        $this->calculateTotalItems();
    }

    /**
     * Open cart modal/sidebar
     */
    public function openCart()
    {
        $this->isOpen = true;
        $this->loadCart();
    }

    /**
     * Close cart modal/sidebar
     */
    public function closeCart()
    {
        $this->isOpen = false;
    }

    /**
     * Toggle cart
     */
    public function toggleCart()
    {
        $this->isOpen = !$this->isOpen;
        if ($this->isOpen) {
            $this->loadCart();
        }
    }

    /**
     * Calculate total price
     */
    public function calculateTotal()
    {
        $this->totalPrice = 0;
        foreach ($this->cart as $item) {
            $this->totalPrice += $item['price'] * $item['quantity'];
        }
        return $this->totalPrice;
    }

    /**
     * Calculate total items count
     */
    public function calculateTotalItems()
    {
        $this->totalItems = 0;
        foreach ($this->cart as $item) {
            $this->totalItems += $item['quantity'];
        }
        return $this->totalItems;
    }

    /**
     * Add product to cart
     */
    public function addToCart($productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            session()->flash('cart_error', 'المنتج غير موجود!');
            return;
        }

        if (!$product->is_active) {
            session()->flash('cart_error', 'هذا المنتج غير مفعل حالياً!');
            return;
        }

        if ($product->stock <= 0) {
            session()->flash('cart_error', 'عذراً، هذا المنتج غير متوفر حالياً!');
            return;
        }

        if (isset($this->cart[$productId])) {
            if ($this->cart[$productId]['quantity'] < $product->stock) {
                $this->cart[$productId]['quantity']++;
                session()->flash('cart_success', 'تم زيادة كمية ' . $product->name);
            } else {
                session()->flash('cart_error', 'لقد تجاوزت الحد الأقصى للمخزون!');
                return;
            }
        } else {
            $this->cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
            ];
            session()->flash('cart_success', 'تم إضافة ' . $product->name . ' إلى السلة');
        }

        $this->syncSession();
        $this->isOpen = true;
    }

    /**
     * Increment quantity
     */
    public function incrementQuantity($productId)
    {
        if (!isset($this->cart[$productId])) {
            session()->flash('cart_error', 'المنتج غير موجود في السلة');
            return;
        }

        $product = Product::find($productId);

        if (!$product) {
            session()->flash('cart_error', 'المنتج غير موجود');
            return;
        }

        if ($this->cart[$productId]['quantity'] < $product->stock) {
            $this->cart[$productId]['quantity']++;
            $this->syncSession();
            session()->flash('cart_success', 'تم زيادة الكمية');
        } else {
            session()->flash('cart_error', 'لا يمكن إضافة المزيد، تم الوصول لحد المخزون الأقصى!');
        }
    }

    /**
     * Decrement quantity
     */
    public function decrementQuantity($productId)
    {
        if (!isset($this->cart[$productId])) {
            return;
        }

        $this->cart[$productId]['quantity']--;

        if ($this->cart[$productId]['quantity'] <= 0) {
            unset($this->cart[$productId]);
            session()->flash('cart_success', 'تم إزالة المنتج من السلة');
        } else {
            session()->flash('cart_success', 'تم إنقاص الكمية');
        }

        $this->syncSession();
    }

    /**
     * Remove item from cart
     */
    public function removeFromCart($productId)
    {
        if (isset($this->cart[$productId])) {
            $productName = $this->cart[$productId]['name'];
            unset($this->cart[$productId]);
            $this->syncSession();
            session()->flash('cart_success', 'تم إزالة ' . $productName . ' من السلة');
        }
    }

    /**
     * Clear entire cart
     */
    public function clearCart()
    {
        $this->cart = [];
        $this->syncSession();
        session()->flash('cart_success', 'تم تفريغ السلة بالكامل');
        $this->closeCart();
    }

    /**
     * Sync session and update
     */
    private function syncSession()
    {
        session()->put('coretech_cart', $this->cart);
        $this->calculateTotal();
        $this->calculateTotalItems();
        $this->dispatch('cartUpdated');
    }

    /**
     * Checkout - Process order
     */
    public function checkout()
    {
        if (!Auth::check()) {
            session()->flash('cart_error', 'يرجى تسجيل الدخول أولاً لإتمام الطلب');
            return redirect()->route('login');
        }

        if (empty($this->cart)) {
            session()->flash('cart_error', 'سلتك فارغة! قم بإضافة منتجات أولاً.');
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
                session()->flash('cart_error', 'بعض المنتجات غير متوفرة حالياً. يرجى تحديث السلة.');
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
            $this->totalItems = 0;
            $this->shippingAddress = '';
            $this->notes = '';

            session()->flash('cart_success', 'تم تسجيل طلب الشراء بنجاح! 🎉 كود التتبع: ' . $order->order_number);
            $this->closeCart();

        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Checkout error: ', [
                'user_id' => Auth::id() ?? 'guest',
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'cart' => $this->cart,
            ]);

            session()->flash('cart_error', 'حدث خطأ أثناء معالجة طلبك. يرجى المحاولة مرة أخرى.');
        }
    }

    /**
     * Render the component
     */
    public function render()
    {
        return view('livewire.cart');
    }
}