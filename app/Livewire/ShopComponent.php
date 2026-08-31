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
    public $selectedCategory = null; 

    public function mount()
    {
        $this->cart = session()->get('coretech_cart', []);
        $this->calculateTotal();
    }

    public function filterCategory($categoryId = null)
    {
        $this->selectedCategory = $categoryId;
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

    public function incrementQuantity($productId)
    {
        $product = Product::find($productId);
        if (isset($this->cart[$productId]) && $this->cart[$productId]['quantity'] < $product->stock) {
            $this->cart[$productId]['quantity']++;
            $this->syncSession();
        } else {
            session()->flash('error', 'تم الوصول للحد الأقصى للمخزون المتاح!');
        }
    }

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

    public function removeFromCart($productId)
    {
        if (isset($this->cart[$productId])) {
            unset($this->cart[$productId]);
            $this->syncSession();
        }
    }

    public function calculateTotal()
    {
        $this->totalPrice = 0;
        foreach ($this->cart as $item) {
            $this->totalPrice += $item['price'] * $item['quantity'];
        }
    }

    private function syncSession()
    {
        session()->put('coretech_cart', $this->cart);
        $this->calculateTotal();
    }

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

        $this->cart = [];
        session()->forget('coretech_cart');
        $this->totalPrice = 0;
        $this->shippingAddress = '';
        $this->notes = '';

        session()->flash('success', 'تم حجز التجميعة بنجاح! رقم الفاتورة الخاص بك: ' . $order->order_number);
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
