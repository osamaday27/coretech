<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductDetails extends Component
{
    public $product;
    public $slug;
    public $cart = [];
    public $totalPrice = 0;
    public $similarProducts = [];

    /**
     * Mount the component with product slug
     */
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->loadProduct();
        $this->loadSimilarProducts();
        $this->loadCart();
    }

    /**
     * Load product details
     */
    public function loadProduct()
    {
        $this->product = Product::where('slug', $this->slug)
            ->where('is_active', true)
            ->with('category')
            ->firstOrFail();
    }

    /**
     * Load similar products from same category
     */
    public function loadSimilarProducts()
    {
        if ($this->product) {
            $this->similarProducts = Product::where('category_id', $this->product->category_id)
                ->where('id', '!=', $this->product->id)
                ->where('is_active', true)
                ->limit(4)
                ->get();
        }
    }

    /**
     * Load cart from session
     */
    public function loadCart()
    {
        $this->cart = session()->get('coretech_cart', []);
        $this->calculateTotal();
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
     * Add product to cart
     */
    public function addToCart($productId)
    {
        $product = Product::find($productId);
        
        if (!$product) {
            session()->flash('error', 'المنتج غير موجود!');
            return;
        }

        if (!$product->is_active) {
            session()->flash('error', 'هذا المنتج غير مفعل حالياً!');
            return;
        }

        if ($product->stock <= 0) {
            session()->flash('error', 'عذراً، هذا المنتج غير متوفر حالياً!');
            return;
        }

        // Check if product already in cart
        if (isset($this->cart[$productId])) {
            // Check stock availability
            if ($this->cart[$productId]['quantity'] < $product->stock) {
                $this->cart[$productId]['quantity']++;
                session()->flash('success', 'تم زيادة الكمية لـ ' . $product->name);
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
            session()->flash('success', 'تم إضافة ' . $product->name . ' إلى السلة');
        }

        $this->syncSession();
    }

    /**
     * Sync session and update cart
     */
    private function syncSession()
    {
        session()->put('coretech_cart', $this->cart);
        $this->calculateTotal();
        $this->dispatch('cartUpdated');
    }

    /**
     * Get cart count
     */
    public function getCartCountProperty()
    {
        return count($this->cart);
    }

    /**
     * Render the component
     */
    public function render()
    {
        return view('livewire.product-details', [
            'product' => $this->product,
            'similarProducts' => $this->similarProducts,
        ])->layout('layouts.app');
    }
}