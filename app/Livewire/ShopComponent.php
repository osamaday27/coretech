<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class ShopComponent extends Component
{
    public $cart = []; 
    public $totalPrice = 0;
    public $shippingAddress = '';
    public $notes = '';
    public $selectedCategory = null; // Live filtering toggle

    /**
     * Bootstraps cart state tracking matching memory states
     */
    public function mount()
    {
        $this->cart = session()->get('coretech_cart', []);
        $this->calculateTotal();
    }

    /**
     * Filter hardware products instantly by category
     */
    public function filterCategory($categoryId = null)
    {
        $this->selectedCategory = $categoryId;
    }

    /**
     * Add structural items directly to the shopping cart array
     */
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
            } else {
                session()->flash('error', 'لقد تجاوزت الحد الأقصى للمخزون المتاح من هذه القطعة!');
                return;
            }
        } else {
            $this->cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        $this->syncSession();
    }

    /**
     * Live Increment count directly on cart panel
     */
    public function incrementQuantity($productId)
    {
        $product = Product::find($productId);
        if (isset($this->cart[$productId]) && $this->cart[$productId]['quantity'] < $product->stock) {
            $this->cart[$productId]['quantity']++;
            $this->syncSession();
        } else {
            session()->flash('error', 'لا يمكن إضافة المزيد، تم الوصول لحد المخزون الأقصى!');
        }
    }

    /**
     * Live Decrement count directly on cart panel
     */
    public function decrementQuantity($productId)
    {
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity']--;
            if ($this->cart[$productId]['quantity'] <= 0) {
                unset($this->cart[$productId]);
            }
            $this->syncSession();
        }
    }

    /**
     * Remove whole product row directly from your cart list
     */
    public function removeFromCart($productId)
    {
        if (isset($this->cart[$productId])) {
            unset($this->cart[$productId]);
            $this->syncSession();
        }
    }

    /**
     * Computes final dynamic analytical pricing variables
     */
    public function calculateTotal()
    {
        $this->totalPrice = 0;
        foreach ($this->cart as $item) {
            $this->totalPrice += $item['price'] * $item['quantity'];
        }
    }

    /**
     * Clean global state sync across user interactions
     */
    private function syncSession()
    {
        session()->put('coretech_cart', $this->cart);
        $this->calculateTotal();
    }

    /**
     * Executes order transaction queries directly to SQL
     */
    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (empty($this->cart)) {
            session()->flash('error', 'سلتك فارغة! قم بإضافة قطع هاردوير أولاً لشحنها.');
            return;
        }

        $this->validate([
            'shippingAddress' => 'required|string|min:10',
        ]);

        // 1. Structural Order Table Record creation
        $order = Order::create([
            'user_id' => Auth::id(),
            'order_number' => 'CT-' . strtoupper(uniqid()),
            'total_price' => $this->totalPrice,
            'status' => 'pending',
            'payment_method' => 'cash',
            'payment_status' => 'pending',
            'shipping_address' => $this->shippingAddress,
            'notes' => $this->notes,
        ]);

        // 2. Structural Order Item mappings & Stock balancing
        foreach ($this->cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);

            // Clean real-time inventory counter balance minuses
            $product = Product::find($item['id']);
            $product->decrement('stock', $item['quantity']);
        }

        // Clean out storage memory on completion
        $this->cart = [];
        session()->forget('coretech_cart');
        $this->totalPrice = 0;
        $this->shippingAddress = '';
        $this->notes = '';

        session()->flash('success', 'تم تسجيل طلب الشراء الخاص بك بنجاح! كود التتبع للفاتورة هو: ' . $order->order_number);
    }

    public function render()
    {
        $productQuery = Product::where('is_active', true);
        
        if ($this->selectedCategory) {
            $productQuery->where('category_id', $this->selectedCategory);
        }

        return view('livewire.shop-component', [
            'products' => $productQuery->with('category')->get(),
            'categories' => Category::where('is_visible', true)->get(),
        ]);
    }
}
